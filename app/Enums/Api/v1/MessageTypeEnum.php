<?php

namespace App\Enums\Api\v1;

use App\Api\v1\EnumInterface;

enum MessageTypeEnum: string implements EnumInterface
{
    case Message = 'message';
    case Document = 'doc';
    case Image = 'image';

    public static function toArray(): array
    {
        return array_column(MessageTypeEnum::cases(), 'value');
    }
}
