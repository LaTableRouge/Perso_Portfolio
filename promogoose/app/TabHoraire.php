<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabHoraire extends Model
{
    public function magasin(){

        //les horaires appartiennent à un magasin

        return $this->belongsTo(Magasin::class);
    }
}
