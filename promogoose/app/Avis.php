<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    //
    public function adhesions(){
        return $this->hasMany(Adhesion::class);
    }
}
