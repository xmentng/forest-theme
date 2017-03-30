<?php

namespace App\Listeners;

use App\Events\AssignRole;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Role;

class AssignRoleFired
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
     * @param  AssignRole  $event
     * @return void
     */
    public function handle(AssignRole $event)
    {
        //
        $user = User::find($event->userId)->toArray();
    }
}
