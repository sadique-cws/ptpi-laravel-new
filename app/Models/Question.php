<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
     protected $fillable = [
        'exam_set_id',
        'question_text',
        'options',
        'correct_options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function examSet(): BelongsTo
    {
        return $this->belongsTo(ExamSet::class);
    }
}
