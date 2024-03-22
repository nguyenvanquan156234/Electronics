<?php
session_start();
include('../db/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>

    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table th {
            vertical-align: middle;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
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
        <div class="row">
            <?php
            if (isset($_POST['themsanpham'])) {
                $tensanpham = $_POST['sanpham'];
                $hinhanh = $_FILES['hinhanh']['name'];
                $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
                $soluong = $_POST['soluong'];
                $giasanpham = $_POST['giasanpham'];
                $giakhuyenmai = $_POST['giakhuyenmai'];
                $danhmuc = $_POST['danhmuc'];
                $chitiet = $_POST['chitiet'];
                $mota = $_POST['mota'];
                $path = '../upload';
            
                $sql_insert_product = mysqli_query($mysqli, "INSERT INTO tbl_sanpham(sanpham_name, sanpham_chitiet, sanpham_mota,
                    sanpham_gia, sanpham_giakhuyenmai, sanpham_soluong, sanpham_image, category_id) 
                    VALUES ('$tensanpham', '$chitiet', '$mota', '$giasanpham', '$giakhuyenmai','$soluong', '$hinhanh', '$danhmuc')");
            
            move_uploaded_file($hinhanh_tmp, "$path/$hinhanh");
            }else if(isset($_POST['capnhatsanpham'])){
                $id_update = $_GET['capnhat_id'];
                $tensanpham = $_POST['sanpham'];
                $hinhanh = $_FILES['hinhanh']['name'];
                $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
                $soluong = $_POST['soluong'];
                $giasanpham = $_POST['giasanpham'];
                $giakhuyenmai = $_POST['giakhuyenmai'];
                $danhmuc = $_POST['danhmuc'];
                $chitiet = $_POST['chitiet'];
                $mota = $_POST['mota'];
                $path = '../upload';
                if(!$hinhanh){
                    $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name = '',sanpham_chitiet = '',sanpham_mota = '',
                    sanpham_soluong = '',sanpham_gia = '',sanpham_giakhuyenmai = '',category_id = '' WHERE sanpham_id='$id_update'";
                }else{
                    move_uploaded_file($hinhanh_tmp, "$path/$hinhanh");
                    $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name = '$tensanpham',sanpham_chitiet = '$chitiet',sanpham_mota = '$mota ',
                    sanpham_soluong = '$soluong',sanpham_gia = '$giasanpham',sanpham_giakhuyenmai = '$giakhuyenmai',sanpham_image='$hinhanh',category_id = '$danhmuc' WHERE sanpham_id='$id_update'";
                
                }
                mysqli_query($mysqli,$sql_update_image);
            }
           
            // }else if(isset($_POST['suadanhmuc'])) {
            //     $id_capnhap = $_POST['id_danhmuc'];
            //     $tendanhmuc = $_POST['danhmuc'];
            //     $sql_update = mysqli_query($mysqli, "UPDATE tbl_category SET category_name='$tendanhmuc' WHERE 
            //             category_id = '$id_capnhap';

            //         ");
            //         header('Location: xulydanhmuc.php');
            // }
            if (isset($_GET['xoa'])) {
                $id = $_GET['xoa'];
                $sql_xoa = mysqli_query($mysqli, "DELETE FROM tbl_sanpham WHERE sanpham_id = '$id'");
                
            }

            ?>
            <?php
            if (isset($_GET['quanly']) =='capnhat') {
             

                
                $id_capnhat = $_GET['capnhat_id'];
                
                    $sql_capnhat = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    $id_category_1 = $row_capnhat['category_id'];
                
            ?>
            <!-- Form sửa danh mục -->
            <div class="col-md-6">
                        <h2>Cập nhật sản phẩm</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                
                                <label for="tenDanhMuc">Tên sản phẩm:</label>
                                <input type="text" name="sanpham" value="<?php echo $row_capnhat['sanpham_name'];  ?>" class="form-control" id="tenDanhMuc" placeholder="Nhập tên sản phẩm">

                                <label for="tenDanhMuc">Hình ảnh</label>
                                <input type="file" name="hinhanh" class="form-control" placeholder="Chọn file hình ảnh sản phẩm"><br>
                                
                            <img src="../upload/<?php echo $row_capnhat['sanpham_image'] ?>" alt="" height="80" width="80"> <br>
                                
                            <label for="tenDanhMuc">Giá sản phẩm</label>
                                <input type="text" value="<?php echo $row_capnhat['sanpham_gia'];  ?>" name="giasanpham" class="form-control" placeholder="Nhập giá sản phẩm">

                                <label for="tenDanhMuc">Giá khuyến mãi</label>
                                <input type="text" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'];  ?>" name="giakhuyenmai" class="form-control" placeholder="Nhập giá khuyến mãi">

                                <label for="tenDanhMuc">Số lượng</label>
                                <input type="text" value="<?php echo $row_capnhat['sanpham_soluong'];  ?>" name="soluong" class="form-control" placeholder="Nhập số lượng">

                                <label for="tenDanhMuc">Mô tả</label>
                                <textarea class="form-control"  name="mota" id="" cols="" rows="10"><?php echo $row_capnhat['sanpham_mota'];  ?></textarea>

                                <label for="tenDanhMuc">Chi tiết</label>
                                <textarea class="form-control"  name="chitiet" id="" cols="" rows="10"><?php echo $row_capnhat['sanpham_chitiet'];  ?></textarea>

                                <label for="tenDanhMuc">Danh mục</label>

                                <select name="danhmuc" id="" class="form-control">

                                    <option value="0">-----Chọn Danh mục--------</option>
                                    <?php
                                    $sql_danhmuc = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                        if($id_category_1==$row_danhmuc['category_id']){

                                        

                                    ?>
                                        <option selected value="<?php echo $row_danhmuc['category_id']; ?>"><?php echo $row_danhmuc['category_name']; ?></option>
                                        <?php
                                        }else{
                                            ?>
                                            <option  value="<?php echo $row_danhmuc['category_id']; ?>"><?php echo $row_danhmuc['category_name']; ?></option>
                                        <?php
                                        }

                                    }
                                        ?>
                                </select>
                            </div>
                            <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-primary">
                        </form>
                    </div>
                
            <?php
                
            
          

                        // Sau khi xử lý xong, có thể chuyển hướng hoặc in thông báo thành công
                    
                } else {
                    
            
            ?>
            <!-- Form thêm danh mục -->
            <div class="container mt-4 py-4 px-4">
                <div class="row">
                    <!-- Product Form -->
                    <div class="col-md-6">
                        <h2>Danh mục sản phẩm</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <h4>Thêm Sản Phẩm</h4>
                                <label for="tenDanhMuc">Tên sản phẩm:</label>
                                <input type="text" name="sanpham" class="form-control" id="tenDanhMuc" placeholder="Nhập tên sản phẩm">

                                <label for="tenDanhMuc">Hình ảnh</label>
                                <input type="file" name="hinhanh" class="form-control" placeholder="Chọn file hình ảnh sản phẩm">

                                <label for="tenDanhMuc">Giá sản phẩm</label>
                                <input type="text" name="giasanpham" class="form-control" placeholder="Nhập giá sản phẩm">

                                <label for="tenDanhMuc">Giá khuyến mãi</label>
                                <input type="text" name="giakhuyenmai" class="form-control" placeholder="Nhập giá khuyến mãi">

                                <label for="tenDanhMuc">Số lượng</label>
                                <input type="text" name="soluong" class="form-control" placeholder="Nhập số lượng">

                                <label for="tenDanhMuc">Mô tả</label>
                                <textarea class="form-control" name="mota" id="" cols="" rows=""></textarea>

                                <label for="tenDanhMuc">Chi tiết</label>
                                <textarea class="form-control" name="chitiet" id="" cols="" rows=""></textarea>

                                <label for="tenDanhMuc">Danh mục</label>

                                <select name="danhmuc" id="" class="form-control">

                                    <option value="0">-----Chọn Danh mục--------</option>
                                    <?php
                                    $sql_danhmuc = mysqli_query($mysqli, "SELECT * FROM tbl_category ORDER BY category_id DESC");
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {


                                    ?>
                                        <option value="<?php echo $row_danhmuc['category_id']; ?>"><?php echo $row_danhmuc['category_name']; ?></option>
                                        <?php
                                    }
                                        ?>
                                </select>
                            </div>
                            <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-primary">
                        </form>
                    </div>
                                        <?php }  ?>
                    <!-- Category Table -->
                    <div class="col-md-6">
                        <h2>Danh sách Sản phẩm</h2>
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Giá sản phẩm</th>
                                    <th scope="col">Giá khuyến mãi</th>

                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_select_sp = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.category_id =tbl_category.category_id  ORDER BY tbl_sanpham.category_id DESC");
                                $i = 0;
                                while ($row_sp = mysqli_fetch_array($sql_select_sp)) {
                                    $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td scope="row"><?php echo $row_sp['sanpham_name'] ?></td>
                                    
                                    <td scope="row"> <img src="../upload/<?php echo $row_sp['sanpham_image'] ?>" alt="" height="80" width="80"></td>
                                    <td scope="row"><?php echo $row_sp['sanpham_soluong'] ?></td>
                                    <td scope="row"><?php echo $row_sp['category_name'] ?></td>
                                    <td scope="row"><?php echo number_format($row_sp['sanpham_gia']).'vnđ' ?></td>
                                    <td scope="row"><?php echo number_format($row_sp['sanpham_giakhuyenmai']).'vnđ' ?></td>
                                    <td>
                                        <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>" class="btn btn-warning">Sửa</a>
                                        <a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Nội dung trang -->


            <!-- Link Bootstrap JS và Popper.js -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>