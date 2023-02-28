<?php
require '../includes/database-connection.php';
require '../includes/functions.php';


// Xử lý upload file
require '../includes/move-file.php';

// Lấy tên file đã được lưu
$filename = isset($filename) ? $filename : null;

$txtAutId = $_POST['txtAutId'];
$txtArtTL = $_POST['txtArtTL'];
$txtArtTitle = $_POST['txtArtTitle'];
$txtArtBh = $_POST['txtArtBh'];
$txtArtTt = $_POST['txtArtTt'];
$txtArtContent = $_POST['txtArtContent'];

if (isset($_POST['txtId'])) {
    $id = $_POST['txtId'];
    if ($filename) {
        $sql = "UPDATE `baiviet` SET `ma_tgia`='" . $txtAutId . "', `ma_tloai`='" . $txtArtTL . "', `tieude`='" . $txtArtTitle . "', `ten_bhat`='" . $txtArtBh . "', `tomtat`='" . $txtArtTt . "', `noidung`='" . $txtArtContent . "', `hinhanh`='" . $filename . "' WHERE `ma_bviet` = '" . $id . "'";
    } else {
        $sql = "UPDATE `baiviet` SET `ma_tgia`='" . $txtAutId . "', `ma_tloai`='" . $txtArtTL . "', `tieude`='" . $txtArtTitle . "', `ten_bhat`='" . $txtArtBh . "', `tomtat`='" . $txtArtTt . "', `noidung`='" . $txtArtContent . "' WHERE `ma_bviet` = '" . $id . "'";
    }
} else {
    if ($filename) {
        $sql = "INSERT INTO `baiviet`(`ma_tgia`, `ma_tloai`, `tieude`, `ten_bhat`, `tomtat`, `noidung`, `hinhanh`)
    VALUES ('" . $txtAutId . "', '" . $txtArtTL . "', '" . $txtArtTitle . "', '" . $txtArtBh . "', '" . $txtArtTt . "', '" . $txtArtContent . "', '" . $filename . "')";
    } else {
        $sql = "INSERT INTO `baiviet`(`ma_tgia`, `ma_tloai`, `tieude`, `ten_bhat`, `tomtat`, `noidung`)
    VALUES ('" . $txtAutId . "', '" . $txtArtTL . "', '" . $txtArtTitle . "', '" . $txtArtBh . "', '" . $txtArtTt . "', '" . $txtArtContent . "')";
    }
}



$update = pdo($pdo, $sql)->fetchAll();
header("Location:article.php");
