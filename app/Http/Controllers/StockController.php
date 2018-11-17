<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ColorCard;
use App\Receive;
use App\Send;

class StockController extends Controller
{
    public function pusat(){
        $data['menu'] = 6;
        $data['submenu'] = 3;
        $data['colorcards'] = ColorCard::all();
        //dd($data['colorcards']);
        $data['no'] = 1;
        return view('stock.pusat',$data);
    }
}
