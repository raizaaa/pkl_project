<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $fillable = ['id_rw','nama','nama','nama','nama'];
    public $timestamps = true;
    public function rw(){
        return $this->belongsTo('App\Rw','id_rw');
    }
}
