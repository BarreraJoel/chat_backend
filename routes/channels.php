<?php

use App\Broadcasting\Api\v1\ChatChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chats.{chatId}', ChatChannel::class);
