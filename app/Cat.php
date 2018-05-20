<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function scopeKittens($query)
    {
        return $query->where('age', '<', 12);
    }

    public function scopeNotKittens($query)
    {
        return $query->where('age', '>=', 12);
    }

    public function scopeNoBreed($query)
    {
        return $query->whereNull('breed_id');
    }

    public function scopeNoHouse($query)
    {
        return $query->whereNull('house_id');
    }

    public function breed()
    {
        return $this->belongsTo(\App\Breed::class);
    }

    public function house()
    {
        return $this->belongsTo(\App\House::class);
    }

    public function getYearsAttribute()
    {
        return round($this->age / 12, 1);
    }

    public function isKitten()
    {
        return $this->age < 12;
    }
}
