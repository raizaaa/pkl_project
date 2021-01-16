<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $fillable = ['id_kota','kode_kecamatan','nama_kecamatan'];
    public $timestamps = true;
    public function kota(){
        return $this->belongsTo('App\Kota','id_kota');
    }
    public function kelurahan(){
        return $this->hasMany('App\Kota','id_provinsi');
    }
}
