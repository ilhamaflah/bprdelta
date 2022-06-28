<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambardokumen extends Model
{
    protected $fillable = ['extension', 'dokumen_id'];

    public function dokumen(){
        return $this->belongsTo('App\Dokumen');
    }
}