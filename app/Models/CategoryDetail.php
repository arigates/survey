<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryDetail extends Model
{
    protected $fillable = [
        'category_id',
        'code',
        'description',
        'satuan',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
