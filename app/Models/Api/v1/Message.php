<?php

namespace App\Models\Api\v1;

use App\Enums\Api\v1\MessageStatusEnum;
use App\Enums\Api\v1\MessageTypeEnum;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Chat;
use App\Models\Api\v1\User;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => MessageTypeEnum::class,
            'status' => MessageStatusEnum::class,
        ];
    }

    protected function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
