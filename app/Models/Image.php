<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'id';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
