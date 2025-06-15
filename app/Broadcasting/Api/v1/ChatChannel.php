<?php

namespace App\Broadcasting\Api\v1;

use App\Models\Api\v1\Chat;
use App\Models\Api\v1\User;

class ChatChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct() {}

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, int $chatId): array|bool
    {
        return $user->chats->contains($chatId);
    }
}
