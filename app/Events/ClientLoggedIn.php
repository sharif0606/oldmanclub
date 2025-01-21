<?php

namespace App\Events;

use App\Models\User\Client;
use Illuminate\Queue\SerializesModels;

class ClientLoggedIn
{
    use SerializesModels;

    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
