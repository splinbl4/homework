<?php
require "bd.php";
if (isset($_POST['rename'])) {
    $id = $_POST['rename'];
    $sql = "SELECT * FROM photos WHERE id = '$id'";
    $result = $connection->query($sql);
    $fname = mysqli_fetch_object($result)->filename;
}
if (isset($_POST['submit2'])) {
    if (isset($_POST['rename'])) {
        $filename = $_POST['rename'];
        $filename = htmlspecialchars($filename, ENT_QUOTES);
        $filename = strip_tags($filename);
        $filename = trim($filename);
        if ($filename == '') {
            $errors[] = 'Введите имя файла!';
        } else {
            $sql = "UPDATE photos SET filename = '$filename'";
            $result = $connection -> query($sql);
            echo 'файл успешно перименован  на: ' . $filename . '<br><br>';
        }
    }
    echo $errors[0];
}
$scanned_directory = array_diff(scandir('photos/'), array('..', '.'));
foreach ($scanned_directory as $row) {
    @rename('photos/'.$row, 'photos/'.$filename);
}
?>
<form method="post">
    <?php
    echo "$fname <input type='text' name='rename' placeholder='Введите новое имя'>
    <button name='submit2' type='submit'>Переименовать</button><br><br>";
?>
 <input type='submit' name='back' formaction='profile.php' value="назад">
</form>
