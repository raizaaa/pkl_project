<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $fillable = ['id_kecamatan','nama_kelurahan'];
    public $timestamps = true;
    public function kelurahan(){
        return $this->belongsTo('App\Kelurahan','id_provinsi');
    }
    public function rw(){
        return $this->belongsTo('App\Kelurahan','id_provinsi');
    }
}
