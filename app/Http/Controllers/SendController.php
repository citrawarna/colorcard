<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorCard;

class SendController extends Controller
{
    public function form(){
        $data['menu'] = 4;
        $data['submenu'] = 2;
        $data['colorcards'] = ColorCard::all();
        return view('send.form', $data);
    }

    public function store(Request $request){
        dd($request->all());
    }
}
