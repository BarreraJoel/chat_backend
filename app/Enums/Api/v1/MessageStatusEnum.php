<?php

namespace App\Enums\Api\v1;

use App\Api\v1\EnumInterface;

enum MessageStatusEnum: string implements EnumInterface
{
    case Sent = 'sent';
    case Received = 'received';
    case Pending = 'pending';

    public static function toArray(): array
    {
        return array_column(MessageStatusEnum::cases(), 'value');
    }
}
