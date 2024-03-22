<?php
    if(isset($_GET['huydon']) && $_GET['magiaodich']){
        $huydon = $_GET['huydon'];
        $mahuy = $_GET['magiaodich'];
    }else{
        $huydon='';
        $mahuy='';
    }
    $sql_update_giaodich= mysqli_query($mysqli,"UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$mahuy'");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Đơn Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
        }
        table {
            color: #fff;
        }
    </style>
</head>
<body>
<div class="col-md-12">
                <table class="table table-bordered table-striped mt-4">
                    <h4 class="text-white">
                        Danh sách đơn hàng
                    </h4>
                    <?php
                    if(isset($_GET['khachhang'])){
                        $id_khachhang = $_GET['khachhang'];

                    }else{
                        $id_khachhang='';
                    }
                    $sql_select = mysqli_query($mysqli, "SELECT * FROM tbl_giaodich,tbl_donhang WHERE 
                    tbl_giaodich.magiaodich = tbl_donhang.mahang AND
                    tbl_giaodich.khachhang_id = '$id_khachhang'
             GROUP BY magiaodich ");
                    ?>
                    <thead class="table-header">
                        <tr>
                            <th scope="col">STT</th>

                            <th scope="col">Mã giao dịch</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">
                            Quản lý
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row_donhang = mysqli_fetch_array($sql_select)) {
                            $magiaodich = $row_donhang['magiaodich'];
                            $i++;

                        ?>
                            <tr>
                                <td scope="row"><?php echo $i; ?></td>

                                <td scope="row"><?php echo $magiaodich; ?></td>
                                
                             
                                <td scope="row"><?php echo $row_donhang['ngaythang']; ?></td>
                                <td scope="row"><?php
                                    if($row_donhang['tinhtrangdon'] == 0){
                                        echo " Đã đặt hàng";
                                    }else if($row_donhang['tinhtrangdon'] == 1){
                                        echo " Đã giao cho đơn vị vận chuyển";
                                    }
                                ?></td>
                                <td scope="row">
                                    
                               
                               
                                <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>" class="btn btn-warning btn-sm">Xem chi tiết đơn hàng</a>
                                    <?php
                                      if ($row_donhang['huydon'] == 0) {
                                        // Nếu đơn hàng chưa bị hủy, hiển thị nút để hủy đơn hàng
                                ?>
                                        <a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['magiaodich'] ?>&huydon=1" class="btn btn-danger btn-sm">Hủy đơn hàng</a>
                                <?php
                                    } elseif ($row_donhang['huydon'] == 1) {
                                        // Nếu đơn hàng đang chờ hủy, hiển thị thông báo
                                        echo "Đang chờ hủy";
                                    } else {

                                        // Nếu đơn hàng đã hủy thành công, hiển thị thông báo
                                        mysqli_query($mysqli, "DELETE FROM tbl_donhang WHERE mahang='$magiaodich'");
                                        mysqli_query($mysqli, "DELETE FROM tbl_giaodich WHERE magiaodich='$magiaodich'");
                                       
                                    }
                                        
                                    ?>
                            </td>
                               
                                
                            </tr>
                        <?php
                        }
                        ?>
                        <!-- Thêm các hàng khác tương tự cho danh sách danh mục -->
                    </tbody>
                </table>
                <div class="col-md-12">
                <table class="table table-bordered table-striped mt-4">
                    <h4 class="text-white">
                       Chi tiết đơn hàng
                    </h4>
                    <?php
                    if(isset($_GET['magiaodich'])){
                        $magiaodich = $_GET['magiaodich'];

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
                            
                            <th scope="col">tên khách hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">số lượng</th>
                            <th scope="col">Địa chỉ </th>
                            <th scope="col">Số điện thoại</th>
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
                                <td scope="row"><?php echo $row_donhang['khachhang_name']; ?></td>

                                <td scope="row"><?php echo $row_donhang['sanpham_name']; ?></td>
                                <td scope="row"><?php echo $row_donhang['soluong']; ?></td>
                                <td scope="row"><?php echo $row_donhang['diachi']; ?></td>
                                <td scope="row"><?php echo $row_donhang['phone']; ?></td>
                                <td scope="row"><?php echo $row_donhang['ngaythang']; ?></td>
                              

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
</body>
</html>