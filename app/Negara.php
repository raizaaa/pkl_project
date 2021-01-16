<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    //
    protected $fillable = ['kode_negara','nama_negara'];
    public $timestamps = true;
}
