<?php

namespace App\Listeners;

use App\Events\PostCommented;
use App\Mail\PostCommented as PostCommentedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->comment->post->author->email)->send(
           new PostCommentedMail($event->comment)
        );
    }
}
