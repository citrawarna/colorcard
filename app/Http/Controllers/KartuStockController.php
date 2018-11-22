<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorCard;
use App\Receive;
use App\Send;
use App\RepairStock;
use App\Division;

class KartuStockController extends Controller
{
    public function index(){
        $data['menu'] = 8;
        $data['submenu'] = 3;
        $data['divisi'] = Division::all();
        $data['colorcards'] = ColorCard::all();
        return view('kartu_stock.index', $data);
    }

    public function search(Request $request){
        $validate = $request->validate([
            'colorcard' => 'required'
        ]);
        $id = ColorCard::where('cc_name', $request->colorcard)->first();

        if($id != null){
             if($request->division_id == ''){
                $data['receive'] = Receive::where('colorcard_id', $id->id)->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['send'] = Send::where('colorcard_id', $id->id)->join('divisions', 'divisions.id', '=', 'sends.colorcard_id')->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['repair'] = RepairStock::where('colorcard_id', $id->id)->whereNull('division_id')->whereNull('expired')->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['lokasi'] = 'Pusat';
            } else {
                //$data['receive'] = Receive::where('colorcard_id', $id->id)->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['send'] = Send::where('colorcard_id', $id->id)->where('division_id', $request->division_id)->join('divisions', 'divisions.id', '=', 'sends.colorcard_id')->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['repair'] = RepairStock::where('colorcard_id', $id->id)->where('division_id', $request->division_id)->whereNull('expired')->whereBetween('date', [$request->dari, $request->sampai])->get();
                $data['lokasi'] = 'CW ' . $request->division_id;
            }

        } else {
            $request->session()->flash('danger', 'data CC tidak ada');
            return redirect()->back();

        }
      
        
        $data['menu'] = 8;
        $data['submenu'] = 3;
        $data['no'] = 1;
        $data['cc'] = $request->colorcard;

        return view('kartu_stock.detail_cc', $data);

    }
}
