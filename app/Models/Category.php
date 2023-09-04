<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'code',
        'description',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(CategoryDetail::class);
    }
}
