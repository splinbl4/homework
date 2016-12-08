<?php

$permissions = [
    'notify', 'friends', 'photos ', 'audio', 'docs', 'notes',
    'pages', 'status', 'wall', 'groups', 'messages', 'email', 'notifications',
    'stats', 'ads', 'market', 'offline'
];

$request_params = [
    'client_id' => '5766346',
    'redirect_uri' => 'https://oauth.vk.com/blank.html',
    'response_type' => 'token',
    'display' => 'page',
    'scope' => implode(',', $permissions)
];

$url = 'https://oauth.vk.com/authorize?' . http_build_query($request_params);
echo $url;

//6cf4ec96f8b27b90dcf7dc9dfae3d8c2a3404c550e41ca4e5bd4b6a40962b95424fc1e786f376ef32e72a
