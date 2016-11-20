<?php
$ch = curl_init("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
$fp = fopen('data.json', 'w');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);

$file = file_get_contents('data.json');
$array = json_decode($file, true);

array_walk_recursive($array, function ($item, $key) {
    if ($key == 'title' || $key == 'pageid') {
        echo $item . ' ';
    }
});
fclose($fp);
