<?php
    require '../includes/header.php';  
?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
                <form action="process_add_author.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="path" value="../images/songs/">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAutName">Tên tác giả</span>
                        <input type="text" class="form-control" name="txtAutName" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAutImg">Hình tác giả</span>
                        <input type="file" class="form-control" name="img" >
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
    require '../includes/footer.php';  
?>
