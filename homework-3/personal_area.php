<?php
require "bd.php";
$sql = "SELECT * FROM user WHERE id = '{$_SESSION['id']}'";
$result = $connection -> query($sql);
$record = mysqli_fetch_object($result);
?>

<h3>Личные данные</h3>
<p>Ваше имя: <?php echo $record->name?></p>
<p>Ваш возраст: <?php echo $record->age?> лет</p>
<p>О себе: <?php echo $record->description?></p>
<p>Список загруженных изображений: </p>
<?php
$sql = "SELECT * FROM photos";
$result = $connection -> query($sql);
while ($record = mysqli_fetch_object($result)) {
    echo $record->filename . '<br>';
}
?>
<form method="POST" action="profile.php" ">
   <br><button name="submit2" type="submit">Редактировать</button><br>
<form>
<p>Перейти на <a href='index.php'>Главную страницу</a></p>
