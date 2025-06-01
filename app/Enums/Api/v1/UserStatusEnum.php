<?php

namespace App\Enums\Api\v1;

use App\Api\v1\EnumInterface;

enum UserStatusEnum: string implements EnumInterface
{
    case Offline = 'offline';
    case Online = 'online';

    public static function toArray(): array
    {
        return array_column(UserStatusEnum::cases(), 'value');
    }
}
