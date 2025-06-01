<?php

use App\Enums\Api\v1\MessageStatusEnum;
use App\Enums\Api\v1\MessageTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', MessageTypeEnum::toArray())->default(MessageTypeEnum::Message);
            $table->string('content');
            $table->enum('status', MessageStatusEnum::toArray())->default(MessageStatusEnum::Pending);
            $table->foreignId('chat_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
