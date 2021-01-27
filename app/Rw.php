<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    //
    protected $fillable = ['id_kelurahan','nama'];
    public $timestamps = true;
    public function kelurahan(){
        return $this->belongsTo('App\Kelurahan','id_kelurahan');
    }
    public function rw(){
        return $this->hasMany('App\Tracking','id_tracking');
    }
}
