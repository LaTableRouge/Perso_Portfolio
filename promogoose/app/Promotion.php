<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    public function magasin(){
        return $this->belongsTo(Magasin::class);
    }

    public function adhesions(){
        return $this->hasMany(Adhesion::class);
    }
}
