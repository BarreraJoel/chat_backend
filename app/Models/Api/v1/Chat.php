<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\User;

class Chat extends Model
{
    protected $fillable = [
        'is_group',
        'name'
    ];

    protected function user()
    {
        return $this->belongsToMany( User::class);
    }
}
