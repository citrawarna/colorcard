<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ColorCard;
use App\Division;
use App\Send;
use App\RepairStock;

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
        $data['submenu'] = 3;
        $data['menu'] = 7;
        $data['no'] = 1;
        return view('stock.stock-division', $data);
    }

    //sesuaikan stock divisi
    public function repairStockDivision(Request $request){
        $validate = $request->validate([
            'colorcard_id' => 'required',
            'division_id' => 'required',
            'difference' => 'required',
            'reason' => 'required'
        ]);
        $data_cc = showDetailCcDivisi($request->division_id, $request->colorcard_id);
        $stock_now = $data_cc[0]->stocks;
        $stock_input = $request->difference;
        //dd($stock_now);

        
        $difference = abs($stock_now - $stock_input);

        if($stock_now > $stock_input){
            $type = 'decrease';
        } else {
            $type = 'increase';
        }

        //expired kan column sebelumnya 
        doExpiredRepair($request->colorcard_id, $request->division_id);

        RepairStock::create([
            'colorcard_id' => $request->colorcard_id,
            'division_id' => $request->division_id,
            'date' => date('Y-m-d'),
            'difference' => $difference,
            'type' => $type,
            'reason' => $request->reason
        ]);

        $request->session()->flash('success', 'Berhasil Melakukan Update Stock Divisi');
        return redirect()->back();
        
    }

    public function repairStockPusat(Request $request){
        $validate = $request->validate([
            'colorcard_id' => 'required',
            'difference' => 'required',
            'reason' => 'required'
        ]);
        $stock_now = $request->stock;
        $stock_input = $request->difference;

        $difference = abs($stock_now - $stock_input);

        if($stock_now > $stock_input){
            $type = 'decrease';
        } else {
            $type = 'increase';
        }

        //expired kan column sebelumnya
        doExpiredRepair($request->colorcard_id);

        RepairStock::create([
            'colorcard_id' => $request->colorcard_id,
            'date' => date('Y-m-d'),
            'difference' => $difference,
            'type' => $type,
            'reason' => $request->reason
        ]);

        $request->session()->flash('success', 'Berhasil Melakukan Update Stock Pusat');
        return redirect()->route('stock.pusat');

    }


}
