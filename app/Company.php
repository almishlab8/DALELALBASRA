<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = "companies";
    public function companydetail(){
        return $this->hasOne('App\Companydetail');
    }
    //
}
