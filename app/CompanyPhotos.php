<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPhotos extends Model
{
    public $table="company_photos";

    public function companyDetails(){
        return $this->belongTo('App\Companydetail');
    }
}
