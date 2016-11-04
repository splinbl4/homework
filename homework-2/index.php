<?php

//Задание #1

function arr_show($arr, $bool = false)
{
    foreach ($arr as $item) {
        $str = '<p>' . $item . '</p>';
        if ($bool) {
            return $str = implode(' ', $arr);
        }
        echo $str;
    }
}
arr_show(['Hello', 'World', '!']);
$str = arr_show(['Hello', 'World', '!'], true);
echo $str . '<hr>';


//Задание #2

function result_show($arr_num, $op)
{
    echo implode($op, $arr_num) . ' = ';
    $res = 0;
    foreach ($arr_num as $j => $element) {
        if (is_numeric($element)) {
            if ($j > 0) {
                switch ($op) {
                    case ' + ':
                        $res += $element;
                        break;
                    case ' - ':
                        $res -= $element;
                        break;
                    case ' * ':
                        $res *= $element;
                        break;
                    case ' / ':
                        $res /= $element;
                        break;
                    default:
                        echo 'Выполнение функции невозможно, неверный аргумент мат.функции';
                        return;
                }
            } else {
                $res = $element;
            }
        } else {
            echo 'Выполнение функции невозможно, в массиве должны быть только числа';
            return;
        }
    }
    echo $res;
}
result_show([2, 3, 2.5], ' * ');
echo '<hr>';


//Задание #3

function calcEverything($str1)
{
    if (is_string($str1)) {
        $array = func_get_args();
        $a = $array[0];
        array_shift($array);
        result_show($array, $a);
    } else {
        echo 'Первый аргумент не строка';
    }
}
calcEverything(' - ', 1, 2, 3, 5.2);
echo '<hr>';


//Задание #4

function result_show1($num1, $num2)
{
    echo '<table cellpadding="5" border="1">';
    if (is_int($num1) && is_int($num2)) {
        for ($r = 1; $r <= $num1; $r++) {
            echo '<tr>';
            for ($c = 1; $c <= $num2; $c++) {
                echo '<td>' . $r * $c . '</td>';
            }
        }
            echo '</tr>';
    } else {
        echo 'Ошибка, числа не являются целыми';
    }
    echo '</table><hr>';
}
result_show1(8, 8);


//Задание #5

function result_show2($str2)
{
    $str2 = str_replace(' ', '', $str2);
    $str2 = mb_strtolower($str2);
    preg_match_all('/./us', $str2, $ar);
    $str3 = implode(array_reverse($ar[0]));
    if ($str2 == $str3) {
        return true;
    } else {
        return false;
    }
}

function result_show3()
{
    if (result_show2('Рото р ') == true) {
        echo 'строка является палиндромом';
    } else {
        echo 'строка не является палиндромом';
    }
}
result_show3();
echo '<hr>';


//Задание #6

echo 'Текущая дата: ' . date('d.m.Y H:i') . '<br>';
$mt = mktime(0, 0, 0, 02, 24, 2016);
echo 'Дата/Время: ' . date('d.m.Y H:i:s', $mt) . '<hr>';


//Задание #7

$st1 = 'Карл у Клары украл Кораллы';
$st1 = str_replace('К', '', $st1);
$st2 = 'Две бутылки лимонада';
$st2 = str_replace('Две', 'Три', $st2);
echo $st1 . '<br>';
echo $st2 . '<hr>';


//Задание #8


function result_show4($str4)
{
    preg_match('/\d+/', $str4, $ok);


    if (preg_match('/\:\)/', $str4) && $ok[0] > 1000) {
        result_show5();
    } elseif ($ok[0] > 1000) {
        echo 'Сеть есть';
    }
}
result_show4('RX :) packets:950381 errors:0 dropped:0 overruns:0 frame:0.');

function result_show5()
{
    echo '( ͡° ͜ʖ ͡°)';
}
echo '<hr>';


//Задание #9

$test = file_get_contents('test.txt');
echo $test . '<hr>';


//Задание #10

$fp = fopen('anothertest.txt', 'w');
fwrite($fp, 'Hello again!');
fclose($fp);
