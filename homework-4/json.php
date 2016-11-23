<?php
// +
$array = [1, 2, 3 =>
    [1, 2, 3]
];
file_put_contents('output.json', json_encode($array));

$file = file_get_contents('output.json');
if (rand(0, 1) === 1) {
    $arr = [4, 5, 6 =>
        [4, 5, 6]
    ];
} else {
    $arr = json_decode($file, true);
}
file_put_contents('output1.json', json_encode($arr));

$file1 = file_get_contents('output.json');
$file2 = file_get_contents('output1.json');
$arr1 = json_decode($file1, true);
$arr2 = json_decode($file2, true);

$result = array_diff($arr1, $arr2);
print_r($result);
