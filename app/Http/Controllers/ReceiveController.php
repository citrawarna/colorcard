<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ColorCard;
use App\Category;

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
            'cc_name' => 'required'
        ]);
        dd($request->all());
    }

    public function autocomplete(Request $request){
        $keywords = $_GET['query'];
        $colorcards = ColorCard::where('cc_name', 'like', '%'.$keywords.'%')->get();
        
        echo json_encode($colorcards->toArray());
    }
}
