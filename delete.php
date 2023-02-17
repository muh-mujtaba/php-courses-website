<?php
include 'connection.php';
$user_id = $_GET['user'];
$sql = "delete from signup where user_id = $user_id";
$result = mysqli_query($conn, $sql);
header("LOCATION: dash.php")
?>