<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $fillable = ['id_rw','jumlah_positif','jumlah_meninggal','jumlah_sembuh','tanggal'];
    public $timestamps = true;
    public function rw(){
        return $this->belongsTo('App\Rw','id_rw');
    }
}
