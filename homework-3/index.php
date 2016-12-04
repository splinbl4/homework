<?php
// Принято
require "bd.php";
if (isset($_SESSION['login']) and isset($_SESSION['id'])) {
    echo 'Авторизован<br>';
     echo 'Привет, ' . ($_SESSION['login']) . '<br>';
    echo  '<a href="personal_area.php">Личный кабинет</a><br>
           <a href="logout.php">Выйти</a>';
} else {
    echo 'Вы не авторизованы!<br>';
    echo '<a href="login.php">Авторизоваться</a><br>
          <a href="reg.php">Регистрация</a><br>';
}
