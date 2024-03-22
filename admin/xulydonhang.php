<?php
session_start();
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>

    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Tùy chỉnh CSS */
        body {
            padding-top: 56px;
            /* Đảm bảo không bị che phủ bởi navbar */
        }

        .container {
            margin-top: 20px;
        }

        .table-header {
            background-color: #343a40;
            color: white;
        }

        .table td,
        .table th {
            text-align: center;

        }

        .no-wrap {
            white-space: nowrap;
        }
    </style>

</head>
<?php
if (isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
} else {
    $dangxuat = '';
}

// Sử dụng toán tử so sánh (==) thay vì toán tử gán (=) để kiểm tra điều kiện
if ($dangxuat == 'dangxuat') {
    session_destroy();
    header('Location: login.php');
}
?>
<?php
if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahangxuly = $_POST['mahangxuly'];
    $sql_update_donhang = mysqli_query($mysqli, "UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahangxuly'");
    $sql_update_giaodich = mysqli_query($mysqli, "UPDATE tbl_giaodich SET tinhtrangdon='$xuly' WHERE magiaodich='$mahangxuly'");
    header('Location: xulydonhang.php');
}

if (isset($_GET['xoadonhang'])) {
    $mahang = $_GET['xoadonhang'];
    $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_donhang WHERE mahang ='$mahang'");
    header('Location: xulydonhang.php');
}
if (isset($_GET['xacnhanhuy']) && isset($_GET['mahang'])) {
    // Lấy giá trị của biến từ URL
    $huydon = $_GET['xacnhanhuy'];
    $mahuy = $_GET['mahang'];

    // Cập nhật trạng thái hủy đơn trong cơ sở dữ liệu
    $sql_update_giaodich = mysqli_query($mysqli, "UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$mahuy'");
} else {
    $huydon = '';
    $mahuy = '';
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
    <div class="container py-4">
        <h2>Danh mục Đơn hàng</h2>
        <div class="row">

            <?php
            if (isset($_POST['themdanhmuc'])) {
                $tendanhmuc = $_POST['danhmuc'];
                $sql_insert = mysqli_query($mysqli, "INSERT INTO tbl_category(category_name) 
                    VALUES ('$tendanhmuc')
                
                ");
            } else if (isset($_POST['suadanhmuc'])) {
                $id_capnhap = $_POST['id_danhmuc'];
                $tendanhmuc = $_POST['danhmuc'];
                $sql_update = mysqli_query($mysqli, "UPDATE tbl_category SET category_name='$tendanhmuc' WHERE 
                    category_id = '$id_capnhap';
                
                ");
                header('Location: xulydanhmuc.php');
            }
            // if (isset($_GET['xoa'])) {
            //     $id = $_GET['xoa'];
            //     $sql_xoa = mysqli_query($mysqli, "DELETE FROM tbl_category WHERE category_id = '$id'");
            // }

            // 
            ?>
            <?php
            if (isset($_GET['quanly'])) {
                $sua = $_GET['quanly'];
            } else {
                $sua = '';
            }

            if (isset($_GET['quanly']) == 'xemdonhang') {



                $mahang = $_GET['mahang'];

                $sql_chitietdon = mysqli_query($mysqli, "SELECT * FROM tbl_khachhang,tbl_donhang,tbl_sanpham WHERE 
                tbl_donhang.sanpham_id =tbl_sanpham.sanpham_id AND  
                tbl_donhang.mahang = '$mahang' AND
                 tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id");



            ?>
                <div class="col-md-12">
                    <h4 class="text-primary">Xem chi tiết đơn hàng</h4>
                    <!-- Form sửa danh mục -->
                    <form action="" method="post">
                        <table class="table table-bordered table-striped mt-4">

                            <?php
                            $sql_select = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id 
                                =tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
                            ORDER BY tbl_donhang.donhang_id DESC");
                            ?>
                            <thead class="table-header">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã hàng</th>
                                    <th scope="col">Tên Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng tiền</th>

                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Ghi Chú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($row_donhang = mysqli_fetch_array($sql_chitietdon)) {
                                    $i++;

                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $i; ?></td>
                                        <td scope="row"><?php echo $row_donhang['mahang']; ?></td>
                                        <td scope="row"><?php echo $row_donhang['sanpham_name']; ?></td>
                                        <td scope="row"><?php echo $row_donhang['soluong']; ?></td>
                                        <td scope="row" class="no-wrap"><?php echo number_format($row_donhang['sanpham_giakhuyenmai']) . ' vnđ'; ?></td>
                                        <td scope="row" class="no-wrap"><?php echo number_format($row_donhang['sanpham_giakhuyenmai'] * $row_donhang['soluong']) . ' vnđ'; ?></td>
                                        <td scope="row" class="no-wrap"><?php echo $row_donhang['khachhang_name']; ?></td>
                                        <td scope="row"><?php echo $row_donhang['ngaythang']; ?></td>
                                        <input type="hidden" name="mahangxuly" value="<?php
                                                                                        echo $row_donhang['mahang']; ?>">
                                        <td scope="row" class="no-wrap"><?php echo $row_donhang['ghichu']; ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                                <!-- Thêm các hàng khác tương tự cho danh sách danh mục -->
                            </tbody>
                        </table>
                        <select name="xuly" id="" class="form-control">
                            <option value="1">Đã xử lý</option>
                            <option value="0">Chưa xử lý</option>
                        </select>
                        <input type="submit" class="btn btn-success" name="capnhatdonhang" value="Cập nhật đơn hàng">

                    </form>
                </div>
                <?php
                if (isset($_POST['suadanhmuc'])) {
                    $newCategoryName = $_POST['danhmuc'];

                    // Thực hiện các thao tác xử lý dữ liệu sau khi nhấn nút "Cập nhật Danh Mục"
                    // Ví dụ: Cập nhật dữ liệu trong cơ sở dữ liệu

                    // Sau khi xử lý xong, có thể chuyển hướng hoặc in thông báo thành công
                }
                //     } else {
                //         echo "ID không hợp lệ.";
                //     }
            } else {

                ?>





                <!-- Form thêm danh mục -->


            <?php

            }
            ?>

            <div class="col-md-12">
                <table class="table table-bordered table-striped mt-4">
                    <h4 class="text-danger">
                        Liệt kê đơn hàng
                    </h4>
                    <?php
                    $sql_select = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id 
                =tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id = tbl_khachhang.khachhang_id
             GROUP BY tbl_donhang.mahang");
                    ?>
                    <thead class="table-header">
                        <tr>
                            <th scope="col">STT</th>

                            <th scope="col">Mã hàng</th>
                            <th scope="col">Tình Trạng đơn hàng</th>

                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">hủy đơn</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row_donhang = mysqli_fetch_array($sql_select)) {
                            $i++;

                        ?>
                            <tr>
                                <td scope="row"><?php echo $i; ?></td>

                                <td scope="row"><?php echo $row_donhang['mahang']; ?></td>
                                <td scope="row"><?php
                                                if ($row_donhang['tinhtrang'] == 0) {
                                                    echo 'Chưa xử lý';
                                                } else {
                                                    echo 'Đã xử lý';
                                                }
                                                ?></td>
                                <td scope="row"><?php echo $row_donhang['khachhang_name']; ?></td>
                                <td scope="row"><?php echo $row_donhang['ngaythang']; ?></td>

                                <td scope="row"><?php echo $row_donhang['ghichu']; ?></td>
                                <td scope="row">
                                    <?php
                                    if ($row_donhang['huydon'] == 0) {
                                        echo "";
                                    } elseif ($row_donhang['huydon'] == 1) {
                                        echo '<a class="btn btn-danger" href="xulydonhang.php?quanly=xemdonhang&mahang=' . $row_donhang['mahang'] . '&xacnhanhuy=2">yêu cầu hủy đơn</a>';
                                    } else {
                                        echo "Đã xác nhận hủy";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>" class="btn btn-warning btn-sm">Xem đơn hàng</a>
                                    <a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <!-- Thêm các hàng khác tương tự cho danh sách danh mục -->
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Danh sách danh mục -->

    </div>


    <!-- Nội dung trang -->


    <!-- Link Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>