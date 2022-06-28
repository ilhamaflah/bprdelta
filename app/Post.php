<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','judul', 'deskripsi', 'tanggal', 'pegawai_id'];

    public function gambarpost(){
        return $this->hasOne('App\Gambarpost');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public static function getAllPost()
    {
        return $result = self::all();
    }
}