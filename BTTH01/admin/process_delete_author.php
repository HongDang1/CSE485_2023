<?php
require '../includes/database-connection.php';
require '../includes/functions.php';
$id = $_GET['id'];
$sql = "DELETE FROM `tacgia` WHERE `ma_tgia` = '" . $id . "'";
$delete = pdo($pdo, $sql)->fetchAll();
header("Location:author.php");
?>