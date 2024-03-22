<?php session_start(); ?>
<style>
    /* Form style */
    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .right-w3l {
        margin-top: 20px;
    }

    /* Checkbox style */
    .custom-control-input {
        margin-top: 5px;
    }

    /* Link style */
    .sub-w3l a {
        color: #007bff;
    }

    /* Error message style */
    .error-message {
        color: #ff0000;
        margin-top: 10px;
    }

    /* Sign up link style */
    .dont-do a {
        color: #007bff;
        font-weight: bold;
    }

    .dont-do a:hover {
        text-decoration: underline;
    }
</style>
<?php 
						if(isset($_GET['quanly'])){
							$tam1 = $_GET['quanly'];
						}else{
							$tam1 = '';
						}
						if($tam1=='matkhau'){
						
							include_once './include/quenmatkhau.php';
						}else {
					?>

<?php
   
if (isset($_POST['login']) && ($_POST['login'])) {
    $err = [];

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Validation
    if (empty($username)) {
        $err['username'] = 'Bạn chưa nhập tên đăng nhập';
    }
    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }

    if (empty($err)) {
        // Retrieve hashed password from the database based on the entered username
        $result = mysqli_query($mysqli, "SELECT user_password FROM tbl_user WHERE user_name = '$username'");

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashedPasswordFromDB = $row['user_password'];
                //var_dump($hashedPasswordFromDB);
                
                //$check = password_verify($hashedPassword, $hashedPasswordFromDB);
                //var_dump($check);
                // Verify the entered password against the hashed password in the database
                //if (password_verify($password, $hashedPasswordFromDB)) {
                    // Password is correct
                   
                    // Store user identifier in the session, you can customize it based on your database structure
                   if($password == $hashedPasswordFromDB){

                   
                    $_SESSION['username'] = $username;
                    header('Location: index.php');
                    exit();
                } else {
                    // Password is incorrect
                    $err['password'] = 'Mật khẩu không đúng';
                }
            } else {
                // User with the given username doesn't exist
                $err['username'] = 'Tên đăng nhập không tồn tại';
            }
        } else {
            $err['database'] = 'Đã xảy ra lỗi khi truy vấn cơ sở dữ liệu';
        }
    }
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" class="form-control" placeholder=" " name="username">
        <div class="error-message"><?php echo isset($err['username']) ? $err['username'] : ''; ?></div>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" placeholder=" " name="password">
        <div class="error-message"><?php echo isset($err['password']) ? $err['password'] : ''; ?></div>
    </div>
    <div class="right-w3l">
        <input type="submit" name="login" class="form-control btn btn-primary" value="Log in">
    </div>
    <div class="sub-w3l">
        <div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
            <label class="custom-control-label" for="customControlAutosizing">Ghi nhớ</label>
        </div>
        <div class="custom-control custom-checkbox mr-sm-2">
            <a href="?quanly=matkhau">Quên mật khẩu</a>
        </div>
    </div>
    <p class="text-center dont-do mt-3">Bạn không có tài khoản
        <a href="?quanly=dangky">Đăng ký ngay</a>
    </p>
</form>
<?php } ?>
