<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendController extends Controller
{
    public function form(){
        $data['menu'] = 4;
        $data['submenu'] = 2;
        return view('send.form', $data);
    }
}
