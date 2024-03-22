<?php
session_start();
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>

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
if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahangxuly = $_POST['mahangxuly'];
    $sql_update_donhang = mysqli_query($mysqli, "UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahangxuly'");
}
if (isset($_GET['xoadonhang'])) {
    $mahang = $_GET['xoadonhang'];
    $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_donhang WHERE mahang ='$mahang'");
    header('Location: xulydonhang.php');
}
?>
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

    <div class="container py-4">
        
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




            <div class="col-md-12">
                <table class="table table-bordered table-striped mt-4">
                    <h4 class="text-danger">
                        Khách hàng
                    </h4>
                    <?php
                    $sql_select_khachhang = mysqli_query($mysqli, "SELECT * FROM tbl_khachhang,tbl_giaodich
                    WHERE tbl_khachhang.khachhang_id = tbl_giaodich.khachhang_id GROUP BY tbl_giaodich.magiaodich
             ORDER BY tbl_khachhang.khachhang_id DESC");
                    ?>
                    <thead class="table-header">
                        <tr>
                            <th scope="col">STT</th>

                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Số điện thoại</th>

                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ngày mua</th>
                            
                            <th scope="col">Ghi chú</th>

                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row_khachhang = mysqli_fetch_array($sql_select_khachhang)) {
                            $i++;

                        ?>
                            <tr>
                                <td scope="row"><?php echo $i; ?></td>

                                
                                
                                <td scope="row"><?php echo $row_khachhang['khachhang_name']; ?></td>
                                <td scope="row"><?php echo $row_khachhang['phone']; ?></td>
                                <td scope="row"><?php echo $row_khachhang['diachi']; ?></td>
                                <td scope="row"><?php echo $row_khachhang['email']; ?></td>
                                <td scope="row"><?php echo $row_khachhang['ngaythang']; ?></td>
                                <td scope="row"><?php echo $row_khachhang['ghichu']; ?></td>
                                
                                <td>
                                    <a href="?quanly=xemgiaodich&khachhang=<?php echo $row_khachhang['magiaodich'] ?>" class="btn btn-warning btn-sm">Xem giao dịch</a>
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <!-- Thêm các hàng khác tương tự cho danh sách danh mục -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped mt-4">
                    <h4 class="text-danger">
                        Lịch sử đơn hàng
                    </h4>
                    <?php
                    if(isset($_GET['khachhang'])){
                        $magiaodich = $_GET['khachhang'];

                    }else{
                        $magiaodich='';
                    }
                    $sql_select = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_giaodich WHERE tbl_giaodich.sanpham_id 
                =tbl_sanpham.sanpham_id AND tbl_giaodich.khachhang_id = tbl_khachhang.khachhang_id AND tbl_giaodich.magiaodich='$magiaodich'
             ORDER BY tbl_giaodich.giaodich_id DESC");
                    ?>
                    <thead class="table-header">
                        <tr>
                            <th scope="col">STT</th>

                            <th scope="col">Mã giao dịch</th>
                            

                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ngày đặt</th>
                            
                            
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

                                <td scope="row"><?php echo $row_donhang['magiaodich']; ?></td>
                                
                                <td scope="row"><?php echo $row_donhang['sanpham_name']; ?></td>
                                <td scope="row"><?php echo $row_donhang['ngaythang']; ?></td>
                               
                               
                                
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