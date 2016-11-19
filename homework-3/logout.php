<?php
require "bd.php";
unset($_SESSION['login']);
unset($_SESSION['id']);
header('Location: index.php');
