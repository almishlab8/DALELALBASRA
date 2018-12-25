<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeFiles extends Model
{
    protected $table = 'employee_files';
    public function employeeFiles(){
        return $this->belongTo('App\Employe');
    }
}
