<?php
require '../includes/header.php';
require '../includes/database-connection.php';
require '../includes/functions.php';
// $sql = "SELECT * FROM `baiviet`";
$sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat, baiviet.noidung,
tacgia.ten_tgia, baiviet.ngayviet, baiviet.hinhanh
FROM
baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia ORDER BY baiviet.ma_bviet";
$arrBaiViet = pdo($pdo, $sql)->fetchAll();
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="add_article.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Tên bài hát</th>
                        <th scope="col">Tên thể loại</th>
                        <th scope="col">Tóm tắt</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Ngày viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($arrBaiViet as $key => $item) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $item['ma_bviet'] ?></th>
                            <td><?php echo $item['tieude'] ?></td>
                            <td><?php echo $item['ten_bhat'] ?></td>
                            <td><?php echo $item['ten_tloai'] ?></td>
                            <td><?php echo $item['tomtat'] ?></td>
                            <td><?php echo $item['noidung'] ?></td>
                            <td><?php echo $item['ten_tgia'] ?></td>
                            <td><?php echo $item['ngayviet'] ?></td>
                            <td>
                                <img src="../images/songs/<?php echo $item['hinhanh']; ?>" class="rounded-3" style="width: 150px;" alt="...">
                            </td>
                            <td>
                                <a href="edit_article.php?id=<?php echo $item['ma_bviet'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="process_delete_article.php?id=<?php echo $item['ma_bviet'] ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
require '../includes/footer.php';
?>