<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Supplier;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\HtmlString;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $supplier = DB::table('supplier')->get();

         return view::make('design.header') . view::make('supplier.index', ['supplier' => $supplier]). View::make('design.footer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view::make('design.header') . view::make('supplier.create'). View::make('design.footer');
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
            'nama' => 'required',
            'email' => 'required|email',
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=10000,max_height=10000',

        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('logo');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/app/company';
        $file->move($tujuan_upload,$nama_file);
 

        $supplier = new Supplier();
  $supplier->nama = $request->nama;
  $supplier->email = $request->email;
  $supplier->logo = $nama_file; //hashed password.
  $supplier->save();
 
        Session::flash('flash_message', 'Input Supplier successfully!');

       return redirect('supplier')->with('alert','Input Berhasil');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_supplier)
    {
         $supplier = Supplier::find($id_supplier);

        return view::make('design.header') . view::make('supplier.view', ['supplier' => $supplier]) . View::make('design.footer');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_supplier)
    {
        
        $supplier = Supplier::find($id_supplier);
        return view::make('design.header') . view::make('supplier.edit', ['supplier' => $supplier]) . View::make('design.footer');  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_supplier)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'logo' => 'file|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=10000,max_height=10000',
        ]);
 

        $supplier =  Supplier::find($id_supplier);
        $supplier->nama = $request->get('nama');
        $supplier->email = $request->get('email');
  if($request->file('logo') == "")
        {
            $supplier->logo = $supplier->logo;
        } 
        else
        {
            $file       = $request->file('logo');
            $fileName   = $file->getClientOriginalName();
            $request->file('logo')->move('storage/app/company', $fileName);
            $supplier->logo = $fileName;
        }
  $supplier->save();
 
        Session::flash('flash_message', 'Update Supplier successfully!');

       return redirect('supplier')->with('alert','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_supplier)
    {
        $supplier = Supplier::find($id_supplier);
        $supplier->delete();

        return redirect('supplier')->with('success', 'Supplier deleted!');
    }
}
