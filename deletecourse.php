<?php
include 'connection.php';
$user_id = $_GET['user'];
$sql = "delete from subject where s_id = $user_id";
$result = mysqli_query($conn, $sql) or die('query error');
header("LOCATION: offeredcourse.php")
?>