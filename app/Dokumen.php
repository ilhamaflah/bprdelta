<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $fillable = ['name', 'nasabah_id'];

    public function gambardokumens(){
        return $this->hasMany('App\GambarDokumen');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
