<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    protected $fillable = ['id','sejarah', 'visi', 'misi', 'thumb1', 'thumb2' , 'banner', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
