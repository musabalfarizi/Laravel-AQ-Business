<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Departments extends Model
{
    protected $table ="departments";
       protected $primaryKey = 'id_departments';

    protected $fillable = ['kode_departments','nama'];


  public static function boot()
{
    parent::boot();

    self::creating(function ($model) {
        $model->kode_departments = IdGenerator::generate(['table' => 'departments','field' => 'kode_departments', 'length' => 7, 'prefix' =>'DP-']);
    });
}
}
