<?php

$fields = ['connections', 'site', 'eduction', 'contacts', 'photo_max', 'status', 'city'];

$request_params = [
    'group_id' => 'loftschool',
    'sort' => 'id_asc',
    'offset' => 0,
    'count' => 30,
    'fields' => implode(',', $fields),
    'access_token' => '6cf4ec96f8b27b90dcf7dc9dfae3d8c2a3404c550e41ca4e5bd4b6a40962b95424fc1e786f376ef32e72a'
];

$url = 'https://api.vk.com/method/groups.getMembers?' . http_build_query($request_params);

$result = file_get_contents($url);
echo $result;
