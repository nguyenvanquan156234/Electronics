<?php


?>
<?php

if(isset($_GET['quanly'])){
	$tam1 = $_GET['quanly'];
}else{
	$tam1 = '';
}



	if($tam1=='quenmatkhau'){

	include_once './include/quenmatkhau.php';
	}else if (strpos($tam1, 'resetpassword&token=') !== false) {
		include_once './include/resetpassword.php';
	}

if (isset($_POST['dangnhap_home'])) {
	$taikhoan = $_POST['email_login'];
	$matkhau = md5($_POST['password_login']);
	if ($taikhoan == '' || $matkhau == '') {
		echo '<script>alert("làm ơn không để trống")</script>';
	} else {
		$sql_select_admin = mysqli_query($mysqli, "SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau'");
		$count = mysqli_num_rows($sql_select_admin);
		$row_dangnhap = mysqli_fetch_array($sql_select_admin);
		if ($count > 0) {
			$_SESSION['dangnhap_home'] = $row_dangnhap['khachhang_name'];
			$_SESSION['dangnhap_danhgia'] = $row_dangnhap['email'];
			$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
			
			header('Location: index.php?quanly=giohang');
	
		} else {
			echo '<script>alert("Tài khoản mật khẩu sai")</script>';
		}
	}
} else if (isset($_POST['dangky'])) {
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = md5($_POST['password']);
	$note = $_POST['note'];
	$diachi = $_POST['address'];
	$giaohang = $_POST['giaohang'];

	// Thêm dữ liệu vào bảng đơn đặt hàng


	// Thêm dữ liệu vào bảng đơn đặt hàng
	$sql_khachhang = mysqli_query($mysqli, "INSERT INTO tbl_khachhang (khachhang_name, phone, diachi, email,password, ghichu, giaohang)
						VALUES ('$name', '$phone', '$diachi', '$email','$password', '$note', '$giaohang')");
	header('Location: index.php');
	$sql_select_khachhang = mysqli_query($mysqli,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
	$row_khachhang = mysqli_fetch_array($sql_select_khachhang);

			
			
			$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
}
if (isset($_GET['dangxuat'])) {
	$id = $_GET['dangxuat'];
	if ($id == 1) {


		unset($_SESSION['dangnhap_home']);
		header('Location: index.php');
	}
}
?>
<div class="agile-main-top ">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2">
			<div class="col-lg-4 header-most-top">
				<p class="text-white text-lg-left text-center">
					<i class="fas fa-shopping-cart ml-1"></i>
				</p>
			</div>
			<div class="col-lg-8 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul>
				<?php
					if (isset($_SESSION['dangnhap_home'])) {


					?>
					<li class="text-center border-right text-white">
						<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id']; ?>"  class="text-white">
							<i class="fas fa-truck mr-2"></i>Xem đơn hàng: <?php echo $_SESSION['dangnhap_home'];
							?></a>
					</li>
					<?php } ?>
					<li class="text-center border-right text-white">
						<i class="fas fa-phone mr-2"></i> 0329830961
					</li>
					<?php
					if (isset($_SESSION['dangnhap_home'])) {


					?>
						<li class="text-center border-right text-white">
							<p class="text-white">Xin chào: <?php echo $_SESSION['dangnhap_home']; ?></p>
						</li>
						<li class="text-center text-white">
							<a href="?dangxuat=1" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất </a>
						</li>
					<?php } else {

					?>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
					<?php } ?>
				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>

<div class="header-bot">
	<div class="container">
		<div class="row header-bot_inner_wthreeinfo_header_mid">
			<!-- logo -->
			<div class="col-md-3 logo_agile">
				<h1 class="text-center">
					<a href="index.html" class="font-weight-bold font-italic">
						<img src="images/logo2.png" alt=" " class="img-fluid">Electro Store
					</a>
				</h1>
			</div>
			<!-- //logo -->
			<!-- header-bot -->
			<div class="col-md-9 header mt-4 mb-md-0 mb-4">
				<div class="row">
					<!-- search -->
					<div class="col-10 agileits_search">
						<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
							<input class="form-control mr-sm-2" name="timkiem" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
							<button class="btn my-2 my-sm-0" name="timkiem_button" type="submit">Tìm kiếm </button>
						</form>
					</div>
					<!-- //search -->
					<!-- cart details -->
					<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
						<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							
								<button class="btn w3view-cart" type="submit" name="submit" value="">
									<a href="index.php?quanly=giohang"><i class="fas fa-cart-arrow-down"></i></a>
								</button>
							
						</div>
					</div>
					<!-- //cart details -->
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">Đăng nhập</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="text" class="form-control" placeholder=" " name="email_login" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Mật khẩu</label>
						<input type="password" class="form-control" placeholder=" " name="password_login" required="">
					</div>
					<div class="right-w3l">
						<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
					</div>
					<div class="sub-w3l">

					</div>
					<p class="text-center dont-do mt-3">Chưa có tài khoản?
						<a href="#" data-toggle="modal" data-target="#exampleModal2">
							Đăng ký ngay</a>
							<a href="?quanly=quenmatkhau" class="btn btn-primary " >
							Quên mật khẩu</a>
					</p>
					
				</form>
			</div>
		</div>
	</div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Đăng ký</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="col-form-label">Tên khách hàng</label>
						<input type="text" class="form-control" placeholder=" " name="name" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Email</label>
						<input type="email" class="form-control" placeholder=" " name="email" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Phone</label>
						<input type="text" class="form-control" placeholder=" " name="phone" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Address</label>
						<input type="text" class="form-control" placeholder=" " name="address" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder=" " name="password"  required="">
						<input type="hidden" class="form-control" placeholder=" " name="giaohang"  value="0">
					</div>
					<div class="form-group">
						<label class="col-form-label">Ghi chú</label>
						<textarea name="note" class="form-control" id="" cols="" rows=""></textarea>
					</div>
					<div class="right-w3l">
						<input type="submit" name="dangky" class="form-control" value="Đăng ký">
					</div>
					<!-- <div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div> -->
				</form>
			</div>
		</div>
	</div>
</div>
<?php  ?>