<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    public $table = "careers";
    public function careerdetail(){
        return $this->hasOne('App\Careerdetail');
    }
}
