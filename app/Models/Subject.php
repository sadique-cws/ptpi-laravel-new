<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable=[
        "category_id",
        "title"
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(ClassCategory::class, 'category_id');
    }
}
