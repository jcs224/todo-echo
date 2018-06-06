<?php

namespace App\Listeners;

use App\Events\TodoCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompleteTodo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TodoCompleted  $event
     * @return void
     */
    public function handle(TodoCompleted $event)
    {
        //
    }
}
