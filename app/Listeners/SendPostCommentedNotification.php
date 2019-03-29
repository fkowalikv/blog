<?php

namespace App\Listeners;

use App\Events\PostCommented;
use App\Notifications\PostCommented as PostCommentedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostCommentedNotification
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
     * @param  PostCommented  $event
     * @return void
     */
    public function handle(PostCommented $event)
    {
        if ($event->comment->author->id != $event->comment->post->author->id) {
            $event->comment->post->author->notify(new PostCommentedNotification($event->comment));
        }
    }
}
