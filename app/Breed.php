<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function cats()
    {
        return $this->hasMany(\App\Cat::class);
    }
}
