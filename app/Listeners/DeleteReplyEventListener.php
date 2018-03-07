<?php

namespace App\Listeners;

use App\Events\DeleteReplyEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteReplyEventListener
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
     * @param  DeleteReplyEvent  $event
     * @return void
     */
    public function handle(DeleteReplyEvent $event)
    {
        //
    }
}
