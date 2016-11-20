<?php
for ($i = 1; $i <= 60; $i++) {
    var_dump($arr[] = rand(1, 100));
}
array_fill(0, 1, $arr);
ksort($arr);
echo '<pre>';
print_r($arr);

$fp = fopen('data.csv', 'w+');
fputcsv($fp, $arr);
fclose($fp);

$fp1 = fopen('data.csv', 'r');
$arr1 = fgetcsv($fp1);
print_r($arr1);
$sum = 0;
foreach ($arr1 as $item) {
    if ($item % 2 == 0) {
        $sum += $item;
    }
}
echo $sum;
fclose($fp1);
