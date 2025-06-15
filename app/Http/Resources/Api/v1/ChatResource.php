<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\v1\MessageResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'is_group' => $this->is_group,
            'name' => $this->name,
            'messages' => MessageResource::collection($this->messages),
            'users' => MiniUserResource::collection($this->users)
        ];
    }
}
