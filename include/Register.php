
<title>Đăng ký</title>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h5 class="mb-0">Đăng ký</h5>
					</div>
					<div class="card-body">
						<?php
						if (isset($_POST['dangky']) && ($_POST['dangky'])) {
							$err = [];
							$username = mysqli_real_escape_string($mysqli, $_POST['username']);
							$email = mysqli_real_escape_string($mysqli, $_POST['Email']);
							$password = mysqli_real_escape_string($mysqli, $_POST['Password']);
							$confirmPassword = mysqli_real_escape_string($mysqli, $_POST['ConfirmPassword']);

							// Validation
							if (empty($username)) {
								$err['username'] = 'Bạn chưa nhập tên đăng nhập';
							}
							if (empty($email)) {
								$err['email'] = 'Bạn chưa nhập địa chỉ email';
							}
							if (empty($password)) {
								$err['password'] = 'Bạn chưa nhập mật khẩu';
							}
							if (empty($confirmPassword)) {
								$err['confirmPassword'] = 'Bạn chưa xác nhận mật khẩu';
							} elseif ($password !== $confirmPassword) {
								$err['confirmPassword'] = 'Mật khẩu xác nhận không khớp';
							}


							if (empty($err)) {
								// Check if the username or email already exists in the database
								$checkUser = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE user_name = '$username' OR user_email = '$email'");
								if (mysqli_num_rows($checkUser) > 0) {
									$err['database'] = 'Tên đăng nhập hoặc email đã tồn tại.';
								} else {
									// Hash the password
									//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

									// Insert user into the database
									$sqlDangKy = mysqli_query($mysqli, "INSERT INTO tbl_user(user_name, user_password, user_email) VALUES ('$username','$password','$email')");

									if ($sqlDangKy) {
										// Đăng ký thành công, bạn có thể thực hiện các hành động khác ở đây
										// Ví dụ: Hiển thị thông báo thành công, chuyển hướng người dùng đến trang khác, vv.
										header("Location: index.php?quanly=dangnhap");
										exit();
									} else {
										$err['database'] = 'Đã xảy ra lỗi khi thêm người dùng. Vui lòng thử lại sau.';
									}
								}
							}
						}
						?>

						<form action="" method="post">
							<div class="form-group">
								<label for="username">Tên đăng nhập</label>
								<input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
								<div class="has-error"><?php echo isset($err['username']) ? $err['username'] : ''; ?></div>
							</div>
							<div class="form-group">
								<label for="Email">Email</label>
								<input type="email" class="form-control" id="Email" name="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : ''; ?>">
								<div class="has-error"><?php echo isset($err['email']) ? $err['email'] : ''; ?></div>
							</div>
							<div class="form-group">
								<label for="Password">Mật khẩu</label>
								<input type="password" class="form-control" id="Password" name="Password">
								<div class="has-error"><?php echo isset($err['password']) ? $err['password'] : ''; ?></div>
							</div>
							<div class="form-group">
								<label for="ConfirmPassword">Nhập lại mật khẩu</label>
								<input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword">
								<div class="has-error"><?php echo isset($err['confirmPassword']) ? $err['confirmPassword'] : ''; ?></div>
							</div>
							<div class="right-w3l">
								<input type="submit" name="dangky" class="btn btn-primary" value="Đăng ký">
								<div class="has-error"><?php echo isset($err['database']) ? $err['database'] : ''; ?></div>
							</div>
							<div class="sub-w3l">
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
									<label class="custom-control-label" for="customControlAutosizing2">Tôi đồng ý với các Điều khoản và Điều kiện</label>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>