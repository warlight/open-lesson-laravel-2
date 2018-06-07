<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function breed()
    {
        return $this->belongsTo(\App\Breed::class);
    }

    public function house()
    {
        return $this->belongsTo(\App\House::class);
    }

    public function scopeNoHouse($query)
    {
        return $query->whereNull('house_id');
    }

    public function scopeNoBreed($query)
    {
        return $query->whereNull('breed_id');
    }

    public function scopeKittens($query)
    {
        return $query->where('age', '<', 12);
    }

    public function scopeNoKittens($query)
    {
        return $query->where('age', '>=', 12);
    }

    public function isKitten()
    {
        return $this->age < 12;
    }

    public function withoutHouse()
    {
        return is_null($this->house_id);
    }

    public function withoutBreed()
    {
        return is_null($this->breed_id);
    }

    public function getYearsAttribute()
    {
        return round($this->age / 12, 1);
    }
}
