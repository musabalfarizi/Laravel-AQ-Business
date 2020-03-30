<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Assets extends Model
{
    protected $table ="assets";
       protected $primaryKey = 'id_assets';

    protected $fillable = ['kode_assets','nama','tanggal_pembelian','id_category','id_supplier','id_departments','price', 'email'];

    public static function boot()
{
    parent::boot();

    self::creating(function ($model) {
        $model->kode_assets = IdGenerator::generate(['table' => 'assets','field' => 'kode_assets', 'length' => 7, 'prefix' =>'AS-']);
    });
}
}
