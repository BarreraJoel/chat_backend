<?php

namespace App\Http\Controllers\Api\v1;

use App\Api\v1\RepositoryInterface;
use App\Classes\Api\v1\ApiResponse;
use App\Events\Api\v1\ChatCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\StoreChatRequest;
use App\Http\Resources\Api\v1\ChatCollectionResource;
use App\Http\Resources\Api\v1\ChatResource;
use App\Models\Api\v1\Chat;
use App\Models\Api\v1\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    public function __construct(private RepositoryInterface $chatRepository) {}

    public function index()
    {
        $chats = $this->chatRepository->getAll();

        return ApiResponse::response(
            true,
            null,
            ['chats' => ChatResource::collection($chats)]
        );
    }

    public function show(Chat $chat)
    {
        return ApiResponse::response(
            true,
            null,
            ['chat' => new ChatResource($chat)]
        );
    }

    public function store(StoreChatRequest $request)
    {
        $chat = $this->chatRepository->store($request->all());

        broadcast(new ChatCreatedEvent($chat));

        return ApiResponse::response(
            true,
            null,
            ['chat' => new ChatResource($chat)],
            Response::HTTP_CREATED
        );
    }

    public function update(Request $request, Chat $chat)
    {
        // $chat = $this->chatRepository->update($chat->id, $request->all());

        // $chat = Chat::findOrFail($id)->first();
        // $chat->update($request->all());

        Log::info($request->all());
        Log::info($chat);
        $chat->users()->attach($request['userId']);

        return ApiResponse::response(
            true,
            null,
            ['chat' => $chat]
        );
    }

    public function destroy(Chat $chat)
    {
        $chat = $this->chatRepository->destroy($chat->id);

        return ApiResponse::response(
            true,
            null,
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    
}
