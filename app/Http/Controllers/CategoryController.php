<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Category;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\HtmlString;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         $category = DB::table('category')->get();

         return view::make('design.header') . view::make('category.index', ['category' => $category]). View::make('design.footer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      return view::make('design.header') . view::make('category.create'). View::make('design.footer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
 
        $category = new Category();
        $category->kode_category = $request->kode_category;
        $category->nama = $request->nama;
        $category->save();
 
        Session::flash('flash_message', 'Input Category successfully!');

       return redirect('category')->with('alert','Input Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_category)
    {
        $category = Category::find($id_category);

        return view::make('design.header') . view::make('category.view', ['category' => $category]) . View::make('design.footer');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $category = Category::find($id_category);
        return view::make('design.header') . view::make('category.edit', ['category' => $category]) . View::make('design.footer');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_category)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
 

        $category =  Category::find($id_category);
        $category->nama = $request->get('nama');
  $category->save();
 
        Session::flash('flash_message', 'Update Category successfully!');

       return redirect('category')->with('alert','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_category)
    {
        $category = Category::find($id_category);
        $category->delete();

        return redirect('category')->with('success', 'Category deleted!');
    }
}
