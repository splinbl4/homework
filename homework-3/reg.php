<?php
require "bd.php";
if (isset($_POST['submit'])) {
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
    if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
        $errors[] = "Логин может состоять только из букв английского алфавита и цифр";
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
    if (isset($_POST['password2'])) {
        $password2 = $_POST['password2'];
        if ($password2 != $password) {
            $errors[] = 'Повторный пароль введен не верно';
        }
    }
    $sql = "SELECT * FROM user";
    $result = $connection -> query($sql);
    $records = $result -> fetch_all(MYSQLI_ASSOC);
    if (mysqli_num_rows($result)) {
        $sql = "INSERT INTO user (login, password) VALUES('$login', '$password')";
        $result = $connection -> query($sql);
        echo "Вы успешно зарегестрировались!<br>
              Перейдите на <a href='index.php'>Главную страницу</a> и авторизуйтесь";
        exit;
    } else {
        $errors[] = 'Такой логин уже существует';
    }
    if (!empty($errors)) {
        echo $errors[0];
    }
}
?>

<form method="POST">
    <label>Ваш логин:</label><br>
    <input name="login" type="text" value="<?php echo $_POST['login']?>"><br>
    <label>Ваш пароль:</label><br>
    <input name="password" type="password" value="<?php echo $_POST['password']?>"><br>
    <label>Введите Ваш пароль еще раз:</label><br>
    <input name="password2" type="password" value="<?php echo $_POST['password2']?>"><br><br>
    <button name="submit" type="submit">Зарегестрироваться</button>
</form>
    <p>Перейдите на <a href='index.php'>Главную страницу</a></p>
