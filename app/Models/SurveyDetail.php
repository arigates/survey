<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SurveyDetail extends Model
{
    protected $fillable = [
        'survey_id',
        'category_id',
        'category_detail_id',
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryDetail(): BelongsTo
    {
        return $this->belongsTo(CategoryDetail::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'survey_detail_users', 'survey_detail_id', 'user_id');
    }
}
