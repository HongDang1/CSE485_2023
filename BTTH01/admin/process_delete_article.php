<?php
require '../includes/database-connection.php';
require '../includes/functions.php';
$id = $_GET['id'];
$sql = "DELETE FROM `baiviet` WHERE `ma_bviet` = '" . $id . "'";
$delete = pdo($pdo, $sql)->fetchAll();
header("Location:article.php");
?>