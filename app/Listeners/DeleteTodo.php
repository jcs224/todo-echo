<?php

namespace App\Listeners;

use App\Events\TodoDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteTodo
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
     * @param  TodoDeleted  $event
     * @return void
     */
    public function handle(TodoDeleted $event)
    {
        //
    }
}
