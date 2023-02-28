<?php
    require '../includes/database-connection.php';  
    require '../includes/functions.php';  
    $id = $_GET['id'];
    $sql = "DELETE FROM `theloai` WHERE `ma_tloai` = '" . $id . "'";
    $delete = pdo($pdo, $sql)->fetchAll(); 
    header("Location:category.php");
?>