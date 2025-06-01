<?php

namespace App\Listeners\Api\v1;

use App\Events\Api\v1\UserLogged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateStatusUser implements ShouldQueue
{
    use InteractsWithQueue;
    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogged $event): void
    {
        $event->user->status = $event->status->value;
        Log::info($event->user . '' . "status:"  . $event->status->value);
        $event->user->save();
    }
}
