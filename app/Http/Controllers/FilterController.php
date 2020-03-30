<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Validator;

class FilterController extends Controller
{
    function index(Request $request)
    {


      if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        } else {

        $assets = DB::table('assets')
        ->join('category', 'assets.id_category', '=', 'category.id_category')
        ->join('supplier', 'assets.id_supplier', '=', 'supplier.id_supplier')
        ->join('departments', 'assets.id_departments', '=', 'departments.id_departments')
        ->select('assets.*', 'category.nama as nama_category', 'supplier.nama as nama_supplier', 'departments.nama as nama_departments'  )
        ->get();

       return view::make('design.header') . view::make('assets.filter', ['assets' => $assets]). View::make('design.footer');
    }
     
	}

  

}
