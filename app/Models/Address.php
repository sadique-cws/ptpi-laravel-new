<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'pincode',
        'address_type',
        'state',
        'district',
        'post_office',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
