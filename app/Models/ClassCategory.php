<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassCategory extends Model
{
    protected $fillable = [
        'cat_title',
        'cat_description'
    ];

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'category_id');
    }
}
