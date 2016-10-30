<?php
// Принято: 1,2,3,4
// Не принято: 5,6,7,8

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
// Оптимизировать, устранить дублирование

$day = 5;
switch ($day) {
    case 1:
        echo 'Это рабочий день<hr>';
        break;
    case 2:
        echo 'Это рабочий день<hr>';
        break;
    case 3:
        echo 'Это рабочий день<hr>';
        break;
    case 4:
        echo 'Это рабочий день<hr>';
        break;
    case 5:
        echo 'Это рабочий день<hr>';
        break;
    case 6:
        echo 'Это выходной день<hr>';
        break;
    case 7:
        echo 'Это выходной день<hr>';
        break;
    default:
        echo 'Неизвестный   день<hr>';
        break;
}

//Задание #6
// Использовать циклы для вывода

$bmw = ['model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => '2015'];
$toyota = ['model' => 'Camry', 'speed' => 130, 'doors' => 4, 'year' => '2016'];
$opel = ['model' => 'Astra', 'speed' => 120, 'doors' => 5, 'year' => '2014'];

$car = [];
$car [] = $bmw;
$car [] = $toyota;
$car [] = $opel;

echo 'CAR bmv: <br>' . $car[0]['model'] . ' - ' . $car[0]['speed'] . ' - ' .
    $car[0]['doors'] . ' - ' . $car[0]['year'] . '<br>';
echo 'CAR toyota: <br>' . $car[1]['model'] . ' - ' . $car[1]['speed'] . ' - ' .
    $car[1]['doors'] . ' - ' . $car[1]['year'] . '<br>';
echo 'CAR opel: <br>' . $car[2]['model'] . ' - ' . $car[2]['speed'] . ' - ' .
    $car[2]['doors'] . ' - ' . $car[2]['year'] . '<hr>';
?>
    <!--Задание #7-->
// Не соответствует заданию

    <table cellpadding="5" border="1">
        <?php
        for ($r = 1; $r <= 10; $r++) {
            echo '<tr>';
            for ($c = 1; $c <= 10; $c++) {
                echo '<td>';
                $result = ($r * $c);
                if (($result % 2) == 0) {
                    echo '(' . $result . ')';
                } elseif (($result % 2) == 1) {
                    echo '[' . $result . ']';
                } else {
                    echo $result;
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    <hr>

<?php
//Задание #8
// Не соответствует заданию
// Бесполезный цикл

$str = 'Вам еще работать и работать';
echo $str;
$arr = explode(' ', $str);
echo '<pre>';
print_r($arr);
$i = 0;
while ($i < count($arr)) {
    $i++;
}
$str = implode('_', $arr);
echo $str;
?>