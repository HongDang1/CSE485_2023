<?php
require '../includes/header.php';
require '../includes/database-connection.php';
require '../includes/functions.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `tacgia` WHERE ma_tgia = " . ($id);
$recordByID = pdo($pdo, $sql)->fetchAll();
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="process_add_author.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="path" value="../images/songs/">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtAutId" readonly value="<?php echo $recordByID[0]['ma_tgia'] ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtAutName" value="<?php echo $recordByID[0]['ten_tgia']; ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutImg">Hình tác giả</span>
                    <input type="file" class="form-control" name="img">
                </div>
                <div class="form-group  float-end">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="author.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require '../includes/footer.php';
?>
