<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Departments;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\HtmlString;

class DepartmentsController extends Controller
{
     public function index()
    {
         $departments = DB::table('departments')->get();

         return view::make('design.header') . view::make('departments.index', ['departments' => $departments]). View::make('design.footer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
      return view::make('design.header') . view::make('departments.create'). View::make('design.footer');
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
 
        $departments = new Departments();
        $departments->kode_departments = $request->kode_departments;
        $departments->nama = $request->nama;
        $departments->save();
 
        Session::flash('flash_message', 'Input Departments successfully!');

       return redirect('departments')->with('alert','Input Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_departments)
    {
        $departments = Departments::find($id_departments);

        return view::make('design.header') . view::make('departments.view', ['departments' => $departments]) . View::make('design.footer');  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_departments)
    {
        $departments = Departments::find($id_departments);
        return view::make('design.header') . view::make('departments.edit', ['departments' => $departments]) . View::make('design.footer');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_departments)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);
 

        $departments =  Departments::find($id_departments);
        $departments->nama = $request->get('nama');
  		$departments->save();
 
        Session::flash('flash_message', 'Update Departments successfully!');

       return redirect('departments')->with('alert','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_departments)
    {
        $departments = Departments::find($id_departments);
        $departments->delete();

        return redirect('departments')->with('success', 'Departments deleted!');
    }
}
