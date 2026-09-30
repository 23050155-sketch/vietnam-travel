<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'province_id',
        'name',
        'slug',
        'short_description',
        'description',
        'address',
        'cover_image',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}