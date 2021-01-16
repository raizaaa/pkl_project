<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $fillable = ['id_provinsi','kode_kota','nama_kota'];
    public $timestamps = true;
    public function provinsi(){
        return $this->belongsTo('App\Provinsi','id_provinsi');
    }
    
    public function kecamatan(){
        return $this->hasMany('App\Kota','id_kota');
    }
}
