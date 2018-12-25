<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Careerdetails extends Model
{
    //
    public $table="careerdetails";
    public function career(){
        return $this->belongTo('App\Career');
    }
}
