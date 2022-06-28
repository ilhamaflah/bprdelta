<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typekredit extends Model
{
    protected $fillable = ['id','nama', 'keterangan', 'gambar', 'kredit_id'];

    public function kredit(){
        return $this->belongsTo('App\Kredit');
    }
}
