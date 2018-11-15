<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreColorCard;
use App\ColorCard;
use App\Category;
use Illuminate\Support\Facades\Session;

class ColorCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 2;
        $data['colorcards'] = ColorCard::all(); 
        $data['no'] = 1;
        return view('colorcard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 2;
        $data['categories'] = Category::all();
        return view('colorcard.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorCard $request)
    {
        $insert = ColorCard::create($request->all());
        if($insert){
            $request->session()->flash('success', 'Berhasil menambah Color Card');
            return redirect()->route('colorcard.index');
        } else {
            $request->session()->flash('danger', 'Gagal menambah Color Card!!');
            return redirect()->route('colorcard.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['menu'] = 2;
        $data['categories'] = Category::all();
        $data['colorcard'] = ColorCard::find($id);
        return view('colorcard.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColorCard $request, $id)
    {
        $update = ColorCard::find($id)->update($request->all());
        if($update){
            $request->session()->flash('success', 'Berhasil mengedit Color Card');
            return redirect()->route('colorcard.index');
        } else {
            $request->session()->flash('danger', 'Gagal mengedit Color Card!!');
            return redirect()->route('colorcard.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ColorCard::destroy($id);
        if($delete){
            
            return redirect()->route('colorcard.index');
        } else {
            
            return redirect()->route('colorcard.index');
        }
    }
}
