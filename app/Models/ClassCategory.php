<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassCategory extends Model
{
    protected $fillable = [
        'cat_title',
        'cat_description'
    ];
}
