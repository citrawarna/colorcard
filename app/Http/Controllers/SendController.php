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
        $validate = $request->validate([
            'division_id' => 'required',
            'colorcard_id' => 'required',
            'amount' => 'required',
            'date' => 'required|date'
        ]);

        for($i=0; $i < count($request->colorcard_id); $i++){
            $cc_id = ColorCard::where('cc_name', $request->colorcard_id[$i])->first();
            Send::create([
                'division_id' => $request->division_id,
                'date' => $request->date,
                'colorcard_id' => $cc_id->id,
                'amount' => $request->amount[$i],
                'description' => $request->description[$i]
            ]);       
        }

        $request->session()->flash('success', 'Berhasil Mengirim Barang ke Divisi');
        return redirect()->route('send.index');
    }
}
