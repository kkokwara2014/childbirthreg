<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Childreg extends Model
{
    protected $fillable=['certnumber','lastname','firstname','othername','dob','placeofbirth','fathername','mothername','user_id','stateoforigin_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stateoforigin(){
        return $this->belongsTo(Stateoforigin::class);
    }
}
