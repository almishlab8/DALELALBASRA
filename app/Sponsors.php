<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    public $table = "sponsors";

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
