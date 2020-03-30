<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class supplier extends Model
{
    protected $table ="supplier";
       protected $primaryKey = 'id_supplier';

    protected $fillable = ['kode_supplier','nama', 'email'];

    public static function boot()
{
    parent::boot();

    self::creating(function ($model) {
        $model->kode_supplier = IdGenerator::generate(['table' => 'supplier','field' => 'kode_supplier', 'length' => 7, 'prefix' =>'SP-']);
    });
}

}
