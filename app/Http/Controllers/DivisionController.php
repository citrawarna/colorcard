<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 5;
        $data['submenu'] = 1;
        $data['no'] = 1;
        $data['divisions'] = Division::all();
        return view('division.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division.create', ['menu' => 5, 'submenu' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'division_name' => 'required|unique:divisions'
        ]);
        $insert = Division::create($request->all());
        if($insert){
            $request->session()->flash('success', 'Berhasil menambah Divisi');
            return redirect()->route('division.index');
        } else {
            $request->session()->flash('danger', 'Gagal menambah Divisi!!');
            return redirect()->route('division.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Division::destroy($id);
        if($delete){
            
            return redirect()->route('division.index');
        } else {
            
            return redirect()->route('division.index');
        }
    
    }
}
