<?php

namespace App\Listeners;

use App\Events\TodoAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddTodo
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
     * @param  TodoAdded  $event
     * @return void
     */
    public function handle(TodoAdded $event)
    {
        //
    }
}
