<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use App\Models\Conversation;
use Pusher\Pusher;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Broadcast::routes(['middleware' => ['auth:sanctum']]);

        // Register the channel authorization rules
        Broadcast::channel('private-conversation.{conversationId}', function ($user, $conversationId) {
            \Log::info('Channel authorization attempt', [
                'user_id' => $user->id,
                'conversation_id' => $conversationId,
                'channel' => 'private-conversation.' . $conversationId
            ]);

            $authorized = Conversation::where('id', $conversationId)
                ->whereHas('users', function ($query) use ($user) {
                    $query->where('clients.id', $user->id);
                })
                ->exists();

            if (!$authorized) {
                \Log::warning('Channel authorization failed', [
                    'user_id' => $user->id,
                    'conversation_id' => $conversationId
                ]);
                return false;
            }

            // Return true to authorize the connection
            return true;
        });
    }
}