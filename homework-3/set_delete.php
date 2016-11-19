<?php
require "bd.php";
$sql = "SELECT * FROM photos";
$result = $connection -> query($sql);

while ($record = mysqli_fetch_object($result)) {
    echo "<input type='radio' name='photo'value='%s'>" . $record->filename . '<br/><br/>';
};



//$entries = array_diff(scandir("photos/"), array('.', '..'));

//echo "<a href = 'delete_photo.php'>Удалить</a><br>";