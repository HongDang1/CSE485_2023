<?php
    require '../includes/database-connection.php';  
    require '../includes/functions.php';  
    $name = $_POST['txtCatName'];
    if(isset($_POST['txtCatId'])){
        $id = $_POST['txtCatId'];
        $sql = "UPDATE `theloai` SET `ten_tloai`='" . $name . "' WHERE `ma_tloai` = '" . $id . "'";
    }else{
        $sql = "INSERT INTO `theloai`(`ten_tloai`) VALUES ('" . $name . "')";
    }

    $update = pdo($pdo, $sql)->fetchAll(); 
    header("Location:category.php");
?>