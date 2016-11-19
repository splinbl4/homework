<?php
require "bd.php";

//Редактирование данных о себе
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $errors = [];
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $name = htmlspecialchars($name, ENT_QUOTES);
        $name = strip_tags($name);
        $name = trim($name);
        if ($name == '') {
            $errors[] = 'Введите имя!';
        }
    }
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        $age = htmlspecialchars($age, ENT_QUOTES);
        $age = strip_tags($age);
        $age = trim($age);
        if ($age == '') {
            $errors[] = 'Введите возраст!';
        }
    }
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
        $description = htmlspecialchars($description, ENT_QUOTES);
        $description = strip_tags($description);
        $description = stripslashes($description);
        if ($description == '') {
            $errors[] = 'Пару слов о себе!';
        }
    }
    $sql = "UPDATE user SET name = '$name', age = '$age', description = '$description' WHERE id = '$id'";
    $result = $connection -> query($sql);
    echo "Изменения сохранены! Перейдите в Ваш <a href='personal_area.php'>личный кабинет</a><br>";
    $sql = "SELECT * FROM user";
    $result = $connection -> query($sql);
    $record = mysqli_fetch_array($result);
//    $_SESSION['name'] = $record['name'];
//    $_SESSION['age'] = $record['age'];
//    $_SESSION['description'] = $record['description'];

    if (!empty($errors)) {
        echo $errors[0];
    }
}

if (isset($_POST['submit1'])) {
    header('Location: personal_area.php');
}

//Добавление файла
if (isset($_POST['submit3'])) {
    $file = $_FILES['file'];
    $uploaddir = 'photos/';
    $uploadfile = $uploaddir . basename($file['name']);
    if (preg_match('/jpg/', $file['name'])
        or preg_match('/png/', $file['name'])
        or preg_match('/gif/', $file['name'])
        or preg_match('/jpeg/', $file['name'])) {
        if (preg_match('/jpg/', $file['type'])
            or preg_match('/png/', $file['type'])
            or preg_match('/gif/', $file['type'])
            or preg_match('/jpeg/', $file['type'])) {
            move_uploaded_file($file['tmp_name'], $uploadfile);
            $filename = $file['name'];
            $id = $_SESSION['id'];
            $sql = "INSERT INTO photos (filename, user_id) VALUES ('$filename', '$id')";
            $result = $connection -> query($sql);
            header("location: profile.php");
        }
    } else {
        echo 'Вы не выбрали файл';
    }
}

//Удаление файла
if (isset($_POST['photo'])) {
    $id = $_POST['photo'];
    $sql = "SELECT * FROM photos WHERE id = '$id'";
    $result = $connection -> query($sql);
    $fname = mysqli_fetch_object($result)->filename;
    $delete_sql = "DELETE FROM photos WHERE id = '$id'";
    $connection -> query($delete_sql);
    $scanned_directory = array_diff(scandir('photos/'), array('..', '.'));
    foreach ($scanned_directory as $row) {
        if ($fname == $row) {
            unlink('photos/'.$row);
            echo 'Успешно удалено<br>';
        }
    }
} else {
    echo 'Выберите фото для удаления<br>';
}
$sql = "SELECT * FROM user";
$result = $connection -> query($sql);
$record = mysqli_fetch_array($result);
?>

<form method="POST" enctype = "multipart/form-data">
    <label>Имя:</label><br>
    <input name="name" type="text" value="<?php echo $record['name']?>"><br>
    <label>Возраст:</label><br>
    <input name="age" type="number" value="<?php echo $record['age']?>"><br>
    <label>О себе:</label><br>
    <textarea name="description" cols="40" rows="3"><?php echo $record['description']?></textarea><br>
    <label>Загрузить фото:</label><br>
    <input name="file" type="file">
    <button name="submit3" type="submit">Загрузить</button><br><br>
    <?php
    $sql = "SELECT * FROM photos";
    $result = $connection -> query($sql);
    while ($record = mysqli_fetch_object($result)) {
        echo "<input type='radio' name='photo' value='$record->id'> $record->filename
        <input type='radio' name='rename' value='$record->id'><br><br>";

    }
    echo "<br><input type='submit' name='ihu' value='удалить'> ";
    echo "<input type='submit' name='rename1' value='переименовать' formaction='rename.php'><br><br>";
    ?>
    <button name="submit" type="submit">Сохранить изменения</button>
    <button name="submit1" type="submit">Назад</button>
</form>

