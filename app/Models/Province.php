<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}