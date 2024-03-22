<?php
if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $giasanpham = $_POST['giasanpham'];
    $hinhanh = $_POST['hinhanh'];
    $soluong = $_POST['soluong'];

    $sql_select_giohang = mysqli_query($mysqli, "SELECT * FROM tbl_giohang where sanpham_id = '$sanpham_id' ORDER BY giohang_id DESC");
    $count = mysqli_num_rows($sql_select_giohang);
    if ($count > 0) {
        $row_sanpham = mysqli_fetch_array($sql_select_giohang);
        $soluong = $row_sanpham['soluong'] + 1;
        $sql_giohang = "UPDATE tbl_giohang set soluong ='$soluong' where sanpham_id = '$sanpham_id'";
    } else {

        $soluong = $soluong;
        $sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong) 
        values('$tensanpham','$sanpham_id','$giasanpham','$hinhanh','$soluong')";
    }
    $insert_row = mysqli_query($mysqli, $sql_giohang);
    if ($insert_row == 0) {
        header('Location:index.php?quanly=chitietsp&id=' . $sanpham_id);
    }
} else if (isset($_POST['capnhatgiohang'])) {



    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $sanpham_id = $_POST['product_id'][$i];

        $soluong = $_POST['soluong'][$i];
        $sql_select_soluong = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$sanpham_id '");
        $row_soluong = mysqli_fetch_array($sql_select_soluong);
        $soluongton = $row_soluong['sanpham_soluong'];
        $mahang = rand(0, 9999);
        if ($soluong <= 0) {
            $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_giohang  WHERE sanpham_id = '$sanpham_id'");
        } else if($soluong >0 && $soluong<=$soluongton){
            $sql_update = mysqli_query($mysqli, "UPDATE tbl_giohang SET soluong = '$soluong' WHERE sanpham_id = '$sanpham_id'");
        }else{
            echo '<script>alert("Số lượng vượt quá hàng tồn kho mời chọn lại")</script>';
        }
    }
} else if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($mysqli, "DELETE FROM tbl_giohang  WHERE giohang_id = '$id'");
} else if (isset($_POST['thanhtoan'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = md5($_POST['password']);
    $note = $_POST['note'];
    $diachi = $_POST['diachi'];
    $giaohang = $_POST['giaohang'];

    // Thêm dữ liệu vào bảng đơn đặt hàng


    // Thêm dữ liệu vào bảng đơn đặt hàng
    $sql_khachhang = mysqli_query($mysqli, "INSERT INTO tbl_khachhang (khachhang_name, phone, diachi, email,password, ghichu, giaohang)
                    VALUES ('$name', '$phone', '$diachi', '$email','$password', '$note', '$giaohang')");





    // Sau khi chuyển dữ liệu, xóa giỏ hàng
    mysqli_query($mysqli, "DELETE FROM tbl_giohang ");

    if ($sql_khachhang) {
        $sql_select_khachhang = mysqli_query($mysqli, "SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $mahang = rand(0, 9999);
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $khachhang_id = $row_khachhang['khachhang_id'];
       
        for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {

            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query($mysqli, "INSERT INTO tbl_donhang (sanpham_id, khachhang_id, soluong, mahang)
                    VALUES ('$sanpham_id', '$khachhang_id', '$soluong', '$mahang')");
            $sql_giaodich = mysqli_query($mysqli, "INSERT INTO tbl_giaodich (sanpham_id,khachhang_id,soluong, magiaodich)
            VALUES ('$sanpham_id','$khachhang_id','$soluong', '$mahang')");
            $sql_delete_thanhtoan = mysqli_query($mysqli, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            $sql_csdl =  mysqli_query($mysqli, "UPDATE tbl_sanpham SET sanpham_soluong =sanpham_soluong-'$soluong' WHERE sanpham_id = '$sanpham_id'");
        }
    }
    // Chuyển hướng người dùng sau khi thanh toán

} else if (isset($_POST['thanhtoandangnhap'])) {


    $khachhang_id = $_SESSION['khachhang_id'];

    // Thêm dữ liệu vào bảng đơn đặt hàng






    // Sau khi chuyển dữ liệu, xóa giỏ hàng



    $mahang = rand(0, 9999);

    for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {

        $sanpham_id = $_POST['thanhtoan_product_id'][$i];
        $soluong = $_POST['thanhtoan_soluong'][$i];
        $sql_donhang = mysqli_query($mysqli, "INSERT INTO tbl_donhang (sanpham_id, khachhang_id, soluong, mahang)
                    VALUES ('$sanpham_id', '$khachhang_id', '$soluong', '$mahang')");
        $sql_giaodich = mysqli_query($mysqli, "INSERT INTO tbl_giaodich (sanpham_id,khachhang_id,soluong, magiaodich)
            VALUES ('$sanpham_id','$khachhang_id','$soluong', '$mahang')");
          $sql_csdl =  mysqli_query($mysqli, "UPDATE tbl_sanpham SET sanpham_soluong =sanpham_soluong-'$soluong' WHERE sanpham_id = '$sanpham_id'");
        $sql_delete_thanhtoan = mysqli_query($mysqli, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        
    }
}

?>
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            Giỏ hàng của bạn

        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
            <?php
            $sql_laygiohang = mysqli_query($mysqli, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");



            ?>


            <div class="table-responsive">
                <form action="" method="post">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tên sản phẩm</th>

                                <th>Giá</th>
                                <th>Tổng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $total = 0;
                            while ($row_fecth_giohang = mysqli_fetch_array($sql_laygiohang)) {
                                $i++;
                                $subtotal = $row_fecth_giohang['soluong'] * $row_fecth_giohang['giasanpham'];
                                $total += $subtotal;

                            ?>
                                <tr class="rem1">
                                    <td class="invert"><?php echo $i ?></td>
                                    <td class="invert-image">
                                        <a href="single.html">
                                            <img src="images/<?php echo $row_fecth_giohang['hinhanh'] ?>" alt=" " height="80%" class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <div class="quantity">
                                            <input type="number" min=1 class="form-control text-center" name="soluong[]" value="<?php echo $row_fecth_giohang['soluong'] ?>">
                                            <input type="hidden" min=1 class="form-control text-center" name="product_id[]" value="<?php echo $row_fecth_giohang['sanpham_id'] ?>">
                                        </div>
                                    </td>
                                    <td class="invert"><?php echo $row_fecth_giohang['tensanpham'] ?></td>
                                    <td class="invert"><?php echo number_format($row_fecth_giohang['giasanpham']) . ' vnd' ?></td>
                                    <td class="invert"><?php echo number_format($subtotal) . ' vnđ'; ?></td>
                                    <td class="invert">
                                        <a href="?quanly=giohang&xoa=<?php echo $row_fecth_giohang['giohang_id'] ?>" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td class="invert bg-warning" colspan="7">Tổng tiền thanh toán: <?php echo number_format($total) . ' vnd' ?></td>

                            </tr>
                            <tr>

                                <td colspan="7">
                                    <input name="capnhatgiohang" class=" btn btn-primary" type="submit" value="Cập nhật giỏ hàng">
                                    <?php
                                    $sql_giohang_select = mysqli_query($mysqli, "SELECT * FROM tbl_giohang");
                                    $count_giohang_select = mysqli_num_rows($sql_giohang_select);
                                    if (isset($_SESSION['dangnhap_home']) && $count_giohang_select > 0) {
                                        while ($row_1 = mysqli_fetch_array($sql_giohang_select)) {

                                    ?>
                                            <input type="hidden" min=1 class="form-control text-center" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
                                            <input type="hidden" min=1 class="form-control text-center" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
                                        <?php
                                        }
                                        ?>
                                        <input name="thanhtoandangnhap" class=" btn btn-success" type="submit" value="Thanh toán giỏ hàng">
                                    <?php } ?>
                                </td>



                            </tr>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
        <?php
         
        ?>

            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
                    <form action="" method="post" class="creditly-card-form agileinfo_form">
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls form-group">
                                        <input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Số Phone" name="phone" required="">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls form-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email" required="">

                                    </div>
                                    <div class="controls form-group">
                                        <input type="password" class="form-control" placeholder="password" name="password" required="">

                                    </div>
                                    <div class="controls form-group">

                                        <textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="giaohang">
                                        <option>Chọn hình thức giao hàng</option>
                                        <option value="1">Thanh toán ATM</option>
                                        <option value="0">Thanh toán khi nhận hàng</option>


                                    </select>
                                </div>
                            </div>
                            <?php
                            $sql_laygiohang = mysqli_query($mysqli, "SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                            while ($row_thanhtoan = mysqli_fetch_array($sql_laygiohang)) {


                            ?>
                                <input type="hidden" min=1 class="form-control text-center" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                                <input type="hidden" min=1 class="form-control text-center" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                            <?php
                            }

                            ?>
                            <input type="submit" name="thanhtoan" class="btn btn-primary" value="Thanh toán">
                        </div>
                </div>
                </form>

            </div>
        <?php  ?>
    </div>
</div>
</div>

<script>
    paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

    paypals.minicarts.cart.on('checkout', function(evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>
<script>
    function updateQuantity(giohang_id, operation) {
        var currentQuantity = parseInt($("#quantity_" + giohang_id).text());
        var newQuantity;

        if (operation === 'increase') {
            newQuantity = currentQuantity + 1;
        } else if (operation === 'decrease' && currentQuantity > 1) {
            newQuantity = currentQuantity - 1;
        } else {
            // Quantity should not go below 1
            return;
        }

        // Update the quantity in the UI
        $("#quantity_" + giohang_id).text(newQuantity);

        // You may want to send an AJAX request to update the quantity in the database
        // Here's a simple example using jQuery
        $.ajax({
            type: "POST",
            url: "update_quantity.php", // Replace with the actual URL to your server-side script
            data: {
                giohang_id: giohang_id,
                newQuantity: newQuantity
            },
            success: function(response) {
                // Handle the response if needed
            },
            error: function(error) {
                console.error("Error updating quantity:", error);
            }
        });
    }
</script>