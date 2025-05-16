<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherPreference extends Model
{

    protected $fillable = [
        'user_id',
        'category_id',
        'subject_id',
        'job_role_id',
    ];
    public function category()
    {
        return $this->belongsTo(ClassCategory::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function jobRole()
    {
        return $this->belongsTo(JobRole::class);
    }

}
