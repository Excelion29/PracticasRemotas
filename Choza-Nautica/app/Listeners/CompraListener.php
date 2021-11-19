<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\ComprasNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CompraListener
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
        User::join('roles','roles.id','=','users.id_rol')
        ->whereIn('users.id_rol',[1,3])
        ->each(function(User $user) use ($event){
            Notification::send($user, new ComprasNotification($event->compra));
        });
    }
}
