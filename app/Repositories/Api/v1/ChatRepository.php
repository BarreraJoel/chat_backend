<?php

namespace App\Repositories\Api\v1;

use App\Api\v1\RepositoryInterface;
use App\Models\Api\v1\Chat;
use App\Models\Api\v1\User;

class ChatRepository implements RepositoryInterface
{

    public function __construct(protected Chat $chat) {}

    public function getAll()
    {
        $chats = $this->chat->all();
        return $chats;
    }

    public function get(int $id)
    {
        $chat = $this->chat->find($id)->first();
        return $chat;
    }

    public function store(array $data)
    {
        $chat = $this->createChat($data);
        return $chat;
    }

    public function update(int $id, array $data)
    {
        $chat = $this->chat->findOrFail($id)->first();
        $chat->update($data);
        return $chat;
    }

    public function destroy(int $id)
    {
        $chat = $this->chat->findOrFail($id)->first();
        return $chat->delete();
    }

    private function createChat(array $data)
    {
        $chat = $this->chat->create($data);
        return $chat;
    }

}
