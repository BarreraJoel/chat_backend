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

    public function users()
    {
        return $this->belongsToMany( User::class);
    }

    public function messages()
    {
        return $this->hasMany( Message::class);
    }
}
