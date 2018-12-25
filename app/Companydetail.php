<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companydetail extends Model
{
    public $table="companydetails";
    public function company(){
        return $this->belongTo('App\Company');
    }
    public function companyPhotos(){
        return $this->hasOne('App\CompanyPhotos');
    }
}
