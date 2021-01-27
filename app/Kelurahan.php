<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $fillable = ['id_kecamatan','nama_kelurahan'];
    public $timestamps = true;
    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan','id_kecamatan');
    }
    public function kelurahan(){
        return $this->hasMany('App\Rw','id_rw');
    }
}
