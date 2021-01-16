<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    //
    protected $fillable = ['id_negara','jumlah_positif','jumlah_meninggal','jumlah_sembuh','tanggal'];
    public $timestamps = true;
}
