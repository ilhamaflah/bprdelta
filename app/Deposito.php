<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $fillable = ['id','keterangan', 'manfaat', 'banner', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
