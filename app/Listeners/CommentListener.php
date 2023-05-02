<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CommentListener implements ShouldQueue
{
//    public $delay = 120;
//    public $queue = 'listen';
//    public $connection = 'redis';

//    public function viaConnection()
//    {
//        // TODO
//        return 'redis';
//    }
//    public function viaQueue()
//    {
//        // TODO
//        return 'redis';
//    }
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
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event): void
    {
//        $email = $event->user->email;
//        Log::channel('info-log')->info($email . 'takise dela');
        $event->post->userLikes()->attach( User::find(auth()->user()->id));
    }
}
