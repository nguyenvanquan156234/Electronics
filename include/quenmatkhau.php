<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';

if (isset($_POST['gui'])) {
    $err = [];

    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập tên email';
    } else {
        // Retrieve hashed password from the database based on the entered email
        $sql_quenmk = mysqli_query($mysqli, "SELECT * FROM tbl_khachhang WHERE email = '$email'");

        if (mysqli_num_rows($sql_quenmk) == 0) {
            $err['email'] = 'địa chỉ email chưa đăng ký';
        } else {
            $chuoiKyTu = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $mkmoi = substr(str_shuffle($chuoiKyTu), 0, 8);
            $mkcsdl = md5($mkmoi);
            $sql_quenmk = mysqli_query($mysqli, "UPDATE tbl_khachhang SET password='$mkcsdl' WHERE email = '$email'");
            $_SESSION['email'] = $_POST["email"];
            if ($sql_quenmk) {
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMAIL username to:
                $mail->Username = "nquan7271@gmail.com";
                // GMAIL password
                $mail->Password = "jyjf yoid ioxh zvyk"; // Phplytest20@php
                $mail->SMTPSecure = "tls";
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587";
                $mail->From = 'nquan7271@gmail.com';
                $mail->FromName = 'Quan';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'reciever_name');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = "<a href='http://localhost:3000/index.php?quanly=doimatkhau&email=" . urlencode($_SESSION['email']) . "'>Click vào đây để thay đổi mật khẩu</a>";

                if ($mail->Send()) {
                    echo '<script> alert("Check Your Email and Click on the link sent to your email");</script>';
                    header('Location:index.php');
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                }
            } else {
                echo "Cập nhật mật khẩu thất bại.";
            }
        }
    }
}

?>
<?php
// function guimk($email,$mkmoi){

//   }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Quên Mật Khẩu</h3>
                    <form method="post">

                        <div class="form-group">
                            <label for="email">Địa chỉ Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="error-message text-danger"><?php echo isset($err['email']) ? $err['email'] : ''; ?></div>
                        </div>

                        <button name="gui" type="submit" class="btn btn-primary btn-block">Gửi Email</button>
                        <a href="index.php" class="btn btn-primary btn-block">Trở về Trang chủ</a>

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>