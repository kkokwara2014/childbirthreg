<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stateoforigin extends Model
{
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stateoforigin(){
        return $this->belongsTo(Stateoforigin::class);
    }
}
