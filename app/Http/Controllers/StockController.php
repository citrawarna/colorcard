<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ColorCard;
use App\Division;
use App\Send;

class StockController extends Controller
{
    //STOCK PUSAT
    public function pusat(){
        $data['menu'] = 6;
        $data['submenu'] = 3;
        $data['colorcards'] = ColorCard::all();
        $data['no'] = 1;
        return view('stock.pusat',$data);
    }

    //STOCK DIVISI
    public function division(){
        $data['menu'] = 7;
        $data['submenu'] = 3;
        $data['divisions'] = Division::all();
        $data['no'] = 1;
        return view('stock.division', $data);
    }

    //detail stock devisi
    public function stockDivision(Request $request){
        $divisi_id = $request->get('divisi');
        $data['stockColorcard'] = showCcDivisi($divisi_id);
        $data['divisi_name'] = Division::find($divisi_id);
        return view('stock.modal-stock', $data);
    }


}
