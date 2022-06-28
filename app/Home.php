<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = ['id','banner', 'user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

// OLD
// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class Home extends Model
// {
//     protected $fillable = ['id','banner', 'user_id'];

//     public function user(){
//         return $this->belongsTo('App\User');
//     }
// }

