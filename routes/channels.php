<?php

use Illuminate\Support\Facades\Broadcast;
use App\Events\MessageSent;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('eggker', function () {
    return true; // or add authorization logic here
});

// Broadcast::channel('eggker', function ($user) {
//     // You can define any authorization logic here if needed
//     return true; // For demonstration purposes, allowing all users to subscribe to the arduino-channel
// });