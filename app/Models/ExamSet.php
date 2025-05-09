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
        'subject',
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

    public function category()
    {
        return $this->belongsTo(ClassCategory::class, 'category_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
