<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employees';

    public function employeeFiles(){
        return $this->hasOne('App\EmployeeFiles');
    }
}
