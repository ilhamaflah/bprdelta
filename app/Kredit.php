<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    protected $fillable = ['id','keterangan', 'syarat_pengajuan', 'banner', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function typekredits(){
        return $this->hasMany('App\Typekredit');
    }
}
