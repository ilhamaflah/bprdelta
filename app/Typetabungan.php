<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typetabungan extends Model
{
    protected $fillable = ['id','nama', 'keterangan', 'gambar', 'tabungan_id'];

    public function tabungan(){
        return $this->belongsTo('App\Tabungan');
    }
}
