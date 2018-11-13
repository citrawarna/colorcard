<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 1;
        $data['no'] = 1;
        $data['categories'] = Category::all();
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 1;
        return view('category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        $validate = $request->validated();
        if($validate){
            $input = $request->toArray();
            Category::create($input);
            $request->session()->flash('success', 'Berhasil menambah kategori');
            return redirect()->route('category.index');
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
        $data['category'] = Category::find($id);
        $data['menu'] = 1;
        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $validate = $request->validated();
        $category = Category::find($id)->update($request->toArray());
        $request->session()->flash('success', 'Berhasil mengedit kategori');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        Session::flash('success', 'Berhasil menghapus kategori');
        return redirect()->route('category.index');
    }
}
