<?php
include 'connection.php';
$vedioid = $_GET['vedio'];
$sql = "delete from vedio where v_id = $vedioid";
$result = mysqli_query($conn, $sql);
header("LOCATION: allvedio.php")
?>