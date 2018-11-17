<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorCard;
use App\Category;
use App\Receive;

class ReceiveController extends Controller
{
    public function form(){
        $data['submenu'] = 2;
        $data['menu'] = 3;
        $data['colorcards'] = ColorCard::all();
        $data['categories'] = Category::all();
        return view('receive.form', $data);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'cc_name' => 'required',
            'qty' => 'required',
            'date' => 'required|date'
        ]);

        //data di insert sambil ngelooping..
        for($i=0; $i < count($request->cc_name); $i++){
            //panggil method yang ada di file Helper
            $cc_id = getCcIdFromDataList($request->cc_name[$i]);
            Receive::create([
                'date' => $request->date,
                'colorcard_id' => $cc_id,
                'qty' => $request->qty[$i],
                'descriptions' => $request->descriptions[$i]
            ]);       
        }

        $request->session()->flash('success', 'Berhasil Menerima Barang');
        return redirect()->route('receive.index');
       
    }

}
