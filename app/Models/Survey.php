<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    protected $fillable = [
        'year',
        'description',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(SurveyDetail::class);
    }
}
