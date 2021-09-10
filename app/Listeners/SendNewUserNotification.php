<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserDatabaseNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id', 5);
        })->get();

        Notification::send($admins, new NewUserDatabaseNotification($event->user));
    }
}
