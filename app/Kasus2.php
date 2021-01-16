<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus2 extends Model
{
    //
    protected $fillable = ['id_rw','jumlah_positif','jumlah_meninggal','jumlah_sembuh','tanggal'];
    public $timestamps = true;
}
