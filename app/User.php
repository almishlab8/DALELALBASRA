<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs()
    {
      return $this->hasMany(Job::class);
    }

    public function important_phones()
    {
      return $this->hasMany(Important_phone::class);
    }


    public function careers()
    {
      return $this->hasMany(Career::class);
    }

    public function careerdetails()
    {
      return $this->hasMany(Careerdetails::class);
    }

    public function markating()
    {
      return $this->hasMany(Markating::class);
    }


    public function Company()
    {
      return $this->hasMany(Company::class);
    }

    public function companyDetail()
    {
      return $this->hasMany(Companydetail::class);
    }

    public function employee()
    {
      return $this->hasMany(Employee::class);
    }

    public function sponsors()
    {
      return $this->hasMany(Sponsors::class);
    }


}
