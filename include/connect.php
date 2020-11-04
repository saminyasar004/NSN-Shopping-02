<?php 

session_start();

$connect = mysqli_connect('localhost', 'root', '', 'e-commerce');
if (!$connect) {
    die("Connection Failed" . mysqli_error($connect));
}


?>
