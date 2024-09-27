<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});



Broadcast::channel('private-chat.{userId}', function ($user, $userId) {
    // Ensure that users can only listen to their own private channels
    return (int) $user->id === (int) $userId;
});
