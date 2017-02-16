<?php



Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('sitechatroom', function ($visitor) {
    return $visitor;
});

Broadcast::channel('sitechatroom', function ($user) {
    return $user;
});