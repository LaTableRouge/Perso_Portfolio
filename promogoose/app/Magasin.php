<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    //

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ville(){
        return $this->belongsTo(Ville::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }
}
