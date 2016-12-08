<?php
//этап №1 - получаем адрес сервера для загрузки
error_reporting(0);
$request_params = [
    'access_token' => '6cf4ec96f8b27b90dcf7dc9dfae3d8c2a3404c550e41ca4e5bd4b6a40962b95424fc1e786f376ef32e72a',
    'v' => '5.60'
];

$url = 'https://api.vk.com/method/photos.getWallUploadServer?' . http_build_query($request_params);
$result = json_decode(file_get_contents($url), true);


//этап №2 - загружаем картинку
$curl = curl_init();
$file = __DIR__. "/26785.jpg";

$file = curl_file_create($file, mime_content_type($file), pathinfo($file)['basename']);
curl_setopt($curl, CURLOPT_URL, $result['response']['upload_url']);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, 'Content-type: multipart/form-data, charset=utf-8');
curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => $file]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

$response_image = json_decode(curl_exec($curl), true);
curl_close($curl);

//этап №3 - сохраняем картинку
$request_params = [
    'user_id' => '22662163',
    'server' => $response_image['server'],
    'photo' => $response_image['photo'],
    'hash' => $response_image['hash'],
    'access_token' => '6cf4ec96f8b27b90dcf7dc9dfae3d8c2a3404c550e41ca4e5bd4b6a40962b95424fc1e786f376ef32e72a',
    'v' => '5.60'
];

$url = 'https://api.vk.com/method/photos.saveWallPhoto?' . http_build_query($request_params);
$result_image = json_decode(file_get_contents($url), true);

//этап №4 - постим картинку
$request_params = [
    'owner_id' => '42918086',
    'friends_only' => 0,
    'message' => 'Картинка',
    'attachments' => 'photo' . $result_image['response'][0]['owner_id'] . '_' . $result_image['response'][0]['id'],
    'access_token' => '6cf4ec96f8b27b90dcf7dc9dfae3d8c2a3404c550e41ca4e5bd4b6a40962b95424fc1e786f376ef32e72a',
    'v' => '5.60'
];
 $url = 'https://api.vk.com/method/wall.post?' . http_build_query($request_params);
$result = file_get_contents($url);
echo $result;
