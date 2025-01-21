<?php

namespace App\Events;

use App\Models\User\Client;
use Illuminate\Queue\SerializesModels;

class ClientLoggedOut
{
    use SerializesModels;

    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
