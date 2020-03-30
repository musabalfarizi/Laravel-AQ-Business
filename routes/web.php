<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::match(['get','post'],'/', 'AdminController@index');

Route::match(['get','post'],'checklogin','AdminController@checklogin');

Route::match(['get','post'], 'logout','AdminController@logout');

Route::match(['get','post'],'category/', 'CategoryController@index');
Route::match(['get','post'],'category/create', 'CategoryController@create');
Route::match(['get','post'],'category/createPost', 'CategoryController@store');
Route::match(['get','post'],'category/update/{id_category}', 'CategoryController@edit');
Route::match(['get','post'],'category/updatePost/{id_category}', 'CategoryController@Update');
Route::match(['get','post'],'category/tampil/{id_category}', 'CategoryController@show');
Route::delete('category/{id_category}', 'CategoryController@destroy');

Route::match(['get','post'],'supplier/', 'SupplierController@index');
Route::match(['get','post'],'supplier/create', 'SupplierController@create');
Route::match(['get','post'],'supplier/createPost', 'SupplierController@store');
Route::match(['get','post'],'supplier/update/{id_supplier}', 'SupplierController@edit');
Route::match(['get','post'],'supplier/updatePost/{id_supplier}', 'SupplierController@Update');
Route::match(['get','post'],'supplier/tampil/{id_supplier}', 'SupplierController@show');
Route::delete('supplier/{id_supplier}', 'SupplierController@destroy');

Route::match(['get','post'],'departments/', 'DepartmentsController@index');
Route::match(['get','post'],'departments/create', 'DepartmentsController@create');
Route::match(['get','post'],'departments/createPost', 'DepartmentsController@store');
Route::match(['get','post'],'departments/update/{id_departments}', 'DepartmentsController@edit');
Route::match(['get','post'],'departments/updatePost/{id_departments}', 'DepartmentsController@Update');
Route::match(['get','post'],'departments/tampil/{id_departments}', 'DepartmentsController@show');
Route::delete('departments/{id_departments}', 'DepartmentsController@destroy');

Route::match(['get','post'],'assets/', 'AssetsController@index');
Route::match(['get','post'],'assets/create', 'AssetsController@create');
Route::match(['get','post'],'assets/createPost', 'AssetsController@store');
Route::match(['get','post'],'assets/update/{id_assets}', 'AssetsController@edit');
Route::match(['get','post'],'assets/updatePost/{id_assets}', 'AssetsController@Update');
Route::match(['get','post'],'assets/tampil/{id_assets}', 'AssetsController@show');
Route::delete('assets/{id_assets}', 'AssetsController@destroy');

Route::match(['get','post'],'filter/', 'FilterController@index');
Route::match(['get','post'],'cari/', 'FilterController@search');

