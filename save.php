<?php
include 'connection.php';
$userid = $_POST['userid'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$status = $_POST['status'];
$sql = "update  signup set user_name = '{$username}',user_email = '{$useremail}',status = '{$status}' where user_id = '{$userid}'";
$result = mysqli_query($conn, $sql) or die("query failed");
header("LOCATION: dash.php");
?>