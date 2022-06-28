<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    

    protected $fillable = [
        'id', 'name', 'username', 'password', 'no_handphone', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function dokumens(){
        return $this->hasMany('App\Dokumen');
    }
    public function tabungan(){
        return $this->hasOne('App\Tabungan');
    }
    public function deposito(){
        return $this->hasOne('App\Deposito');
    }
    public function kredit(){
        return $this->hasOne('App\Kredit');
    }
    public function home(){
        return $this->hasOne('App\Home');
    }
    public function tentang(){
        return $this->hasOne('App\Tentang');
    }
}