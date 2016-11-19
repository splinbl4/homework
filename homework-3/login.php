<?php
require "bd.php";
if (isset($_POST['submit1'])) {
    $errors = [];
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        $login = htmlspecialchars($login, ENT_QUOTES);
        $login = strip_tags($login);
        $login = trim($login);
        if ($login == '') {
            $errors[] = 'Введите логин!';
        }
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = htmlspecialchars($password, ENT_QUOTES);
        $password = strip_tags($password);
        $password = trim($password);
        if ($password == '') {
            $errors[] = 'Введите пароль!';
        }
    }
    $sql = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
    $result = $connection -> query($sql);
    $records = mysqli_fetch_object($result);
    if ($login != $records->login and $password != $records->password) {
        $errors[] = 'Логин или пароль неверный';
    } else {
        $_SESSION['login'] = $records->login;
        echo $_SESSION['id'] = $records->id;
        echo "Вы успешно вошли на сайт!<br> 
        Перейти на <a href='index.php'>Главную страницу</a>";

        exit;
    }
    if (!empty($errors)) {
        echo $errors[0];
    }

}

?>

<form action="login.php" method="POST">
    <label>Логин:</label><br>
    <input name="login" type="text" value="<?php echo $_POST['login']?>"><br>
    <label>Пароль:</label><br>
    <input name="password" type="password" value="<?php echo $_POST['password']?>"><br><br>
    <button name="submit1" type="submit">Войти</button>
    <p>Перейдите на <a href='index.php'>Главную страницу</a></p>
</form>

