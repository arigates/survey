<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyDetailUser extends Model
{
    protected $fillable = [
        'survey_detail_id',
        'user_id',
    ];
}
