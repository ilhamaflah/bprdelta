<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = ['id','keterangan', 'manfaat', 'syarat_orang', 'syarat_perusahaan', 'banner', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function typetabungans(){
        return $this->hasMany('App\Typetabungan');
    }
}
