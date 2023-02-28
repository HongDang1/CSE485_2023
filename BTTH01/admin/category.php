    <?php
            require '../includes/header.php';  
            require '../includes/database-connection.php';  
            require '../includes/functions.php';  
            $sql = "SELECT * FROM `theloai`";
            $arrTheLoai = pdo($pdo, $sql)->fetchAll(); 
    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_category.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach($arrTheLoai as $key => $item){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['ma_tloai'] ?></th>
                                <td><?php echo $item['ten_tloai'] ?></td>
                                <td>
                                    <a href="edit_category.php?id=<?php echo $item['ma_tloai'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="process_delete_category.php?id=<?php echo $item['ma_tloai'] ?>"><i class="fa-solid fa-trash"></i></a>
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