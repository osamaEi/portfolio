<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['company', 'role', 'period', 'description', 'highlights', 'sort_order'];

    protected $casts = [
        'highlights' => 'array',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
