<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    protected $fillable = ['kode_provinsi','nama_provinsi'];
    public $timestamps = true;
    public function kota(){
        return $this->hasMany('App\Kota','id_provinsi');
    }
}
