<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .reset-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .reset-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
        }

        .reset-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reset-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
   
        if(isset($_POST['reset'])){
            $mkmoi = $_POST['new-password'];
            $nhaplaimk =  $_POST['confirm-password'];
            if($mkmoi === $nhaplaimk){
                $mkchinh = md5($mkmoi);
                $sql_reset = mysqli_query($mysqli, "UPDATE tbl_khachhang SET password ='$mkchinh ' WHERE email='" . $_SESSION['email'] . "'");
                echo '<script>alert("Cập nhật mật khẩu thành công");</script>';
                header('Location: index.php');
            }else{
                echo '<script>alert("Mật khẩu nhập lại và mật khẩu mới phải giống nhau");</script>';
            }
        }
    ?>>
    <div class="reset-container">
        <h2>Reset Password</h2>
        <form class="reset-form" action="" method="post">
            <div class="form-group">
                <label for="new-password">Mật khẩu mới:</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button name="reset" type="submit" class="reset-btn">Reset Password</button>
        </form>
    </div>
</body>
</html>



