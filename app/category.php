<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class category extends Model
{
    protected $table ="category";
       protected $primaryKey = 'id_category';

    protected $fillable = ['kode_category','nama'];


  public static function boot()
{
    parent::boot();

    self::creating(function ($model) {
        $model->kode_category = IdGenerator::generate(['table' => 'category','field' => 'kode_category', 'length' => 7, 'prefix' =>'PC-']);
    });
}
}
