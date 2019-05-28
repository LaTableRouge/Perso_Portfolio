<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{
    //
    public function avis(){
        return $this->belongsTo(Avis::class);
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
