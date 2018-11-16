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


        for($i=0; $i < count($request->cc_name); $i++){
            $cc_id = ColorCard::where('cc_name', $request->cc_name[$i])->first();
            Receive::create([
                'date' => $request->date,
                'colorcard_id' => $cc_id->id,
                'qty' => $request->qty[$i],
                'descriptions' => $request->descriptions[$i]
            ]);       
        }

        $request->session()->flash('success', 'Berhasil Menerima Barang');
        return redirect()->route('receive.index');
       
    }

}
