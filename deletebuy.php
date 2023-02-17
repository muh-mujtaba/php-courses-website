<?php
include 'connection.php';
$user_id = $_GET['user'];
$sql = "delete from bank where id = $user_id";
$result = mysqli_query($conn, $sql);
header("LOCATION: dashbuyer.php")
?>