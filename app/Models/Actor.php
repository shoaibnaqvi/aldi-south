<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $primaryKey = 'id';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
