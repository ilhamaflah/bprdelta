<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambarpost extends Model
{
    protected $fillable = ['extension', 'post_id'];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
