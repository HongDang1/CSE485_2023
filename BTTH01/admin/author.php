<?php
            require '../includes/header.php';  
            require '../includes/database-connection.php';  
            require '../includes/functions.php';  
            $sql = "SELECT * FROM `tacgia`";
            $arrTacGia = pdo($pdo, $sql)->fetchAll(); 
    ?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_author.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th scope="col">Hình tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach($arrTacGia as $key => $item){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item['ma_tgia'] ?></th>
                                <td><?php echo $item['ten_tgia'] ?></td>
                                <td>
                                    <img src="../images/songs/<?php echo $item['hinh_tgia'];?>" class="rounded-3" style="width: 150px;" alt="...">
                                </td>
                                <td>
                                    <a href="edit_author.php?id=<?php echo $item['ma_tgia'] ?>"><i class="fa-solid fa-pen-to-square">
                                    </i></a>
                                </td>
                                <td>
                                    <a href="process_delete_author.php?id=<?php echo $item['ma_tgia'] ?>"><i class="fa-solid fa-trash"></i></a>
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