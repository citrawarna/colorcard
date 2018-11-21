<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorCard;
use App\Division;
use App\Send;

class SendController extends Controller
{
    public function form(){
        $data['menu'] = 4;
        $data['submenu'] = 2;
        $data['colorcards'] = ColorCard::all();
        $data['divisions'] = Division::all();
        return view('send.form', $data);
    }

    
    public function store(Request $request){
        //validasi data
        $validate = $request->validate([
            'division_id' => 'required',
            'colorcard_id' => 'required',
            'amount' => 'required',
            'date' => 'required|date'
        ]);
        
        $error_input = array();

        //insert menggunakan looping
        for($i=0; $i < count($request->colorcard_id); $i++){
            //panggil method di file Helpers;
            $cc_id = getCcIdFromDataList($request->colorcard_id[$i]);
            //cek stok cc dan inputan
            $check_stock_cc = checkStockCC($cc_id, $request->amount[$i], $request->division_id);
            $send_id = '';
            //mendapatkan send id dari loop yang baru diinput
            $send_id .= Send::create([
                'division_id' => $request->division_id,
                'date' => $request->date,
                'colorcard_id' => $cc_id,
                'amount' => $request->amount[$i],
                'description' => $request->description[$i]
            ])->id;  
            
            //jika jumlah input lebih banyak dari jumlah stock
            if(!$check_stock_cc){
                //dapatkan datanya
                $nama_barang = Send::find($send_id);
                //simpan ke array
                array_push($error_input, $nama_barang->colorcard_id);
                //delete data yang inputan lebih banyak dari stok
                $nama_barang->forceDelete($send_id);
            }
        }

        //jika panjang error_input lebih dari 0 (berarti ada yg salah) tampilkan nama barang yg salah
        if(count($error_input) == 0){
            //jika input berhasil semua
            $request->session()->flash('success', 'Berhasil Mengirim Barang ke Divisi');
            return redirect()->route('send.index');
        } else {
            $string_name = '';
            for($i = 0; $i < count($error_input); $i++){
                $cc = ColorCard::find($error_input[$i]);
                $cc_name = $cc->cc_name;
                $string_name .= $cc_name .', '; 
            }

            $request->session()->flash('warning', 'Berhasil Mengirim Barang, namun '. $string_name. ' gagal diinput karena stock tidak mencukupi' );
            return redirect()->route('send.index');
        }
        
        //SEMENTARA LOGICNYA GINI DULU, NANTI KLO SCM MINTA REVISI BARU UBAH
        
    }
}
