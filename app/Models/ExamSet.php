<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamSet extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'category_id',
        'subject_id',
        'level_id',
        'total_marks',
        'duration',
        'type',
        'status'
    ];

    protected $casts = [
        'type' => 'string',
        'status' => 'string'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ClassCategory::class, 'category_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }
}
