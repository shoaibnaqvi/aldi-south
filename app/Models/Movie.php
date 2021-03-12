<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $primaryKey = 'id';

    public function actors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Actor::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Image::class);
    }
}
