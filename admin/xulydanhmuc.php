<?php
 session_start();
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>

    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Tùy chỉnh CSS */
        body {
            padding-top: 56px;
            /* Đảm bảo không bị che phủ bởi navbar */
        }
    </style>
</head>
<?php 
    if(isset($_GET['login'])){
        $dangxuat = $_GET['login'];
    } else {
        $dangxuat = '';
    }

    // Sử dụng toán tử so sánh (==) thay vì toán tử gán (=) để kiểm tra điều kiện
    if($dangxuat == 'dangxuat'){
        session_destroy();
        header('Location: login.php');
    }
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="dashboard.php">Tên Hệ Thống</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="xulydonhang.php">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="navbar-text">Xin chào, <?php echo $_SESSION['dangnhap']; ?></p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?login=dangxuat">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4 py-4 px-4">
        <h2>Danh mục sản phẩm</h2>
        <?php
        if (isset($_POST['themdanhmuc'])) {
            $tendanhmuc = $_POST['danhmuc'];
            $sql_insert = mysqli_query($mysqli, "INSERT INTO tbl_category(category_name) 
                    VALUES ('$tendanhmuc')
                
                ");
        }else if(isset($_POST['suadanhmuc'])) {
            $id_capnhap = $_POST['id_danhmuc'];
            $tendanhmuc = $_POST['danhmuc'];
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_category SET category_name='$tendanhmuc' WHERE 
                    category_id = '$id_capnhap';
                
                ");
                header('Location: xulydanhmuc.php');
        }
        if (isset($_GET['xoa'])) {
            $id = $_GET['xoa'];
            $sql_xoa = mysqli_query($mysqli, "DELETE FROM tbl_category WHERE category_id = '$id'");
        }

        ?>
        <?php
        if (isset($_GET['quanly'])) {
            $sua = $_GET['quanly'];
        } else {
            $sua = '';
        }

        if ($sua=='sua') {
            $id_sua = isset($_GET['id']) ? $_GET['id'] : '';
            if ($id_sua) {
                $sql_sua = mysqli_query($mysqli, "SELECT * FROM tbl_category WHERE category_id = '$id_sua'");
                $row_sua = mysqli_fetch_array($sql_sua);
        ?>
                <!-- Form sửa danh mục -->
                <form method="POST">
                    <div class="form-group">
                        <h4>Sửa Danh Mục</h4>
                        <label for="tenDanhMuc">Tên danh mục:</label>
                        <input type="text" name="danhmuc" class="form-control" id="tenDanhMuc" value="<?php echo $row_sua['category_name']; ?>">
                        <input type="hidden" name="id_danhmuc" class="form-control" id="tenDanhMuc" value="<?php echo $row_sua['category_id']; ?>">
                    </div>
                    <input type="submit" name="suadanhmuc" value="Cập nhật Danh Mục" class="btn btn-primary">
                </form>

            <?php
                if (isset($_POST['suadanhmuc'])) {
                    $newCategoryName = $_POST['danhmuc'];

                    // Thực hiện các thao tác xử lý dữ liệu sau khi nhấn nút "Cập nhật Danh Mục"
                    // Ví dụ: Cập nhật dữ liệu trong cơ sở dữ liệu

                    // Sau khi xử lý xong, có thể chuyển hướng hoặc in thông báo thành công
                }
            } else {
                echo "ID không hợp lệ.";
            }
        } else {
            ?>
            <!-- Form thêm danh mục -->
            <form method="POST">
                <div class="form-group">
                    <h4>Thêm Danh Mục</h4>
                    <label for="tenDanhMuc">Tên danh mục:</label>
                    <input type="text" name="danhmuc" class="form-control" id="tenDanhMuc" placeholder="Nhập tên danh mục">
                </div>
                <input type="submit" name="themdanhmuc" value="Thêm Danh Mục" class="btn btn-primary">
            </form>

        <?php
         
        }
        ?>

        <!-- Danh sách danh mục -->
        <table class="table mt-4">
            <?php
            $sql_select = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
            ?>
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($row_categoy = mysqli_fetch_array($sql_select)) {
                    $i++;

                ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $row_categoy['category_name']; ?></td>
                        <td>
                            <a href="?quanly=sua&id=<?php echo $row_categoy['category_id'] ?>" class="btn btn-warning">Sửa</a>
                            <a href="?xoa=<?php echo $row_categoy['category_id'] ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <!-- Thêm các hàng khác tương tự cho danh sách danh mục -->
            </tbody>
        </table>
    </div>


    <!-- Nội dung trang -->


    <!-- Link Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>