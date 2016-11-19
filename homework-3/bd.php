<?php
session_start();
$connection = @new mysqli('localhost', 'root', '', 'bd');

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}
$connection -> query('SET NAMES "UTF-8"');

$sql = "CREATE TABLE `user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(150) NOT NULL,
`age` int(11) NOT NULL,
`description` varchar(255) NOT NULL,
`login` varchar(15) NOT NULL,
`password` varchar(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
$connection -> query($sql);

$sql = "CREATE TABLE `photos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`filename` varchar(50) NOT NULL,
`user_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
$connection -> query($sql);
