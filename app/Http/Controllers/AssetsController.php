<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Assets;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\HtmlString;

class AssetsController extends Controller
{
    public function index()
    {
        $assets = DB::table('assets')
        ->join('category', 'assets.id_category', '=', 'category.id_category')
        ->join('supplier', 'assets.id_supplier', '=', 'supplier.id_supplier')
        ->join('departments', 'assets.id_departments', '=', 'departments.id_departments')
        ->select('assets.*', 'category.nama as nama_category', 'supplier.nama as nama_supplier', 'departments.nama as nama_departments'  )
        ->get();

       return view::make('design.header') . view::make('assets.index', ['assets' => $assets]). View::make('design.footer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view::make('design.header') . view::make('assets.create'). View::make('design.footer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama'=>'required',
            'tanggal_pembelian'=>'required',
            'id_category'=>'required',
            'id_supplier'=>'required',
            'id_departments'=>'required',
            'price' => 'required'
            

        ]);

        $assets = new Assets([
            'nama' => $request->get('nama'),
            'tanggal_pembelian' => $request->get('tanggal_pembelian'),
            'id_category' => $request->get('id_category'),
            'id_supplier' => $request->get('id_supplier'),
            'id_departments' => $request->get('id_departments'),
            'price' => $request->get('price')
          
        ]);
        $assets->save();


        Session::flash('flash_message', 'Input Assets successfully!');

        return redirect('assets')->with('alert','Input Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_assets)
    {
         $assets = Assets::find($id_assets);

        return view::make('design.header') . view::make('assets.view', ['assets' => $assets]) . View::make('design.footer');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_assets)
    {
        
        $assets = Assets::find($id_assets);
        return view::make('design.header') . view::make('assets.edit', ['assets' => $assets]) . View::make('design.footer');  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_assets)
    {
        $request->validate([
            'nama'=>'required',
            'tanggal_pembelian'=>'required',
            'id_category'=>'required',
            'id_supplier'=>'required',
            'id_departments'=>'required',
            'price'=>'required'
        ]);

        $assets = Assets::find($id_assets);
        $assets->nama = $request->get('nama');
        $assets->tanggal_pembelian = $request->get('tanggal_pembelian');
        $assets->id_category = $request->get('id_category');
        $assets->id_supplier = $request->get('id_supplier');
        $assets->id_departments = $request->get('id_departments');
        $assets->price = $request->get('price');
        $assets->save();


        Session::flash('flash_message', 'Update Assets successfully!');

         return redirect('assets')->with('alert','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_assets)
    {
        $assets = Assets::find($id_assets);
        $assets->delete();

        return redirect('assets')->with('success', 'Assets deleted!');
    }
}
