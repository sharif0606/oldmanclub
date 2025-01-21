<?php

namespace App\Listeners;

use App\Events\ClientLoggedIn;
use App\Events\ClientLoggedOut;

class UpdateOnlineStatus
{
    public function handle($event)
    {
        if ($event instanceof ClientLoggedIn) {
            $event->client->update(['is_online' => true]);
        } elseif ($event instanceof ClientLoggedOut) {
            $event->client->update(['is_online' => false]);
        }
    }
}
