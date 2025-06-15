<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Api\v1\ApiResponse;
use App\Events\Api\v1\SentMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\MessageResource;
use App\Models\Api\v1\Chat;
use App\Models\Api\v1\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = Message::create($request->all());
        $chat = Chat::find($message->chat_id);

        broadcast(new SentMessageEvent($chat));

        return ApiResponse::response(
            true,
            null,
            ['message' => new MessageResource($message)],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
