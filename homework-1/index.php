<?php
// Принято: 1,2,3,4,5,7
// Не принято: 6,8

//Задание #1
// Принято

$name = 'Сергей';
$age = '30';
echo "Меня зовут: $name<br>";
echo "Мне $age лет<br>";
echo '"!|\\/\'"\\<hr>';

//Задание #2
// Принято

$picture = 80;
$markers = 23;
$pencil = 40;
$paints = $picture - ($markers + $pencil);
echo $paints . '<hr>';

//Задание #3
// Принято

define(CONST1, 'Значение');
if (defined('CONST1') == true) {
    echo CONST1 . '<br>';
}
define(CONST1, 'Значение1');
echo CONST1 . '<hr>';

//Задание #4
// Принято

$age1 = 30;
if ($age1 >= 18 && $age1 <= 65) {
    echo 'Вам еще работать и работать<hr>';
} elseif ($age1 > 65) {
    echo 'Вам пора на пенсию<hr>';
} elseif ($age1 >= 1 && $age1 <= 17) {
    echo 'Вам ещё рано работать<hr>';
} else {
    echo 'Неизвестный возраст<hr>';
}

//Задание #5
// Принято

$day = 55;
switch ($day) {
    case (1 <= $day && $day <= 5):
        echo 'Это рабочий день<hr>';
        break;
    case (6 <= $day && $day <= 7):
        echo 'Это выходной день<hr>';
        break;
    default:
        echo 'Неизвестный   день<hr>';
        break;
}

//Задание #6
// Не принято
// Элемента $item[0] не существует

$bmw = ['model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => '2015'];
$toyota = ['model' => 'Camry', 'speed' => 130, 'doors' => 4, 'year' => '2016'];
$opel = ['model' => 'Astra', 'speed' => 120, 'doors' => 5, 'year' => '2014'];

$car = [
    'bmv' => $bmw,
    'toyota' => $toyota,
    'opel' => $opel
];

//echo '<pre>';
//print_r($car);
foreach ($car as $car_make => $item) {
    echo 'CAR ' . $car_make . ': ' . '<br>' .
        $item['model'] . ' - ' .
        $item['speed'] . ' - ' .
        $item['doors'] . ' - ' .
        $item['year'] . '<br>';
}
echo '<hr>';

?>
    <!--Задание #7-->
// Принято

    <table cellpadding="5" border="1">
        <?php
        for ($r = 1; $r <= 10; $r++) {
            echo '<tr>';
            for ($c = 1; $c <= 10; $c++) {
                if (($r % 2) == 0 && ($c % 2) == 0) {
                    echo '<td>(' . $r * $c . ')</td>';
                } elseif (($r % 2) != 0 && ($c % 2) != 0) {
                    echo '<td>[' . $r * $c . ']</td>';
                } else {
                    echo '<td>' . $r * $c . '</td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>
    <hr>

<?php
//Задание #8
// Не соответствует заданию
// Массив необходимо развернуть в цикле, после этого склеить в строку, Только лишь потом вывести результат.

$str = 'Вам еще работать и работать';
echo $str . '<br>';
$arr = explode(' ', $str);
print_r($arr);
$str = '';
$i = 0;
while ($i < count($arr)) {
    $str .= $arr[$i] . '_';
    $i++;
}
echo '<br>' . $str = rtrim($str, '_');
?>