<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Đánh Giá</title>
    <style>
        .review-form {
            display: none;
        }

        .counterW {
            margin: 0 0 0 60px;
        }

        .ratingW {
            position: relative;
            margin: 10px 0 0;
        }

        .ratingW li {
            display: inline-block;
            margin: 0px;
        }

        .ratingW li a {
            display: block;
            position: relative;
        }

        .star {
            position: relative;
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .9em;
            margin-right: .9em;
            margin-bottom: 1.2em;
            border-right: .3em solid transparent;
            border-bottom: .7em solid #ddd;
            border-left: .3em solid transparent;
            font-size: 24px;
        }

        .star:before,
        .star:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            position: absolute;
            top: .6em;
            left: -1em;
            border-right: 1em solid transparent;
            border-bottom: .7em solid #ddd;
            border-left: 1em solid transparent;
            -webkit-transform: rotate(-35deg);
            transform: rotate(-35deg);
        }

        .star:after {
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
        }

        .ratingW li.on .star {
            position: relative;
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .9em;
            margin-right: .9em;
            margin-bottom: 1.2em;
            border-right: .3em solid transparent;
            border-bottom: .7em solid #FC0;
            border-left: .3em solid transparent;
            font-size: 24px;
        }

        .ratingW li.on .star:before,
        .ratingW li.on .star:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            position: absolute;
            top: .6em;
            left: -1em;
            border-right: 1em solid transparent;
            border-bottom: .7em solid #FC0;
            border-left: 1em solid transparent;
            -webkit-transform: rotate(-35deg);
            transform: rotate(-35deg);
        }

        .ratingW li.on .star:after {
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
        }
    </style>
</head>

<body>
    <?php
    require 'db/connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guidanhgia'])) {
        $err = [];
        $rating = isset($_POST["rating"]) ? $_POST["rating"] : '';
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $comment = isset($_POST["comment"]) ? $_POST["comment"] : '';

        if (empty($name)) {
            $err['name'] = 'Bạn chưa nhập tên';
        }
        if (empty($email)) {
            $err['email'] = 'Bạn chưa nhập email';
        }

        if (empty($err)) {
            $sql = "INSERT INTO tbl_danhgia (danhgia_rating, danhgia_name, danhgia_email, danhgia_binhluan) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($mysqli, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "isss", $rating, $name, $email, $comment);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    $err['database'] = 'thanhcong';
                    
                } else {
                    $err['database'] = 'Đã xảy ra lỗi khi thêm người dùng. Vui lòng thử lại sau.';
                }

                mysqli_stmt_close($stmt);
            }
            header('Location: index.php');
        }
    }
    ob_end_flush();
    ?>
    <div class="container mt-5">
 
            <h4>Viết đánh giá của bạn</h4>
            <form method="post">

                <div class="form-group">

                    <p class="counterW">score: <span class="scoreNow">3</span> out of <span>5</span></p>
                    <input type="hidden" id="selectedRating" name="rating" value="3">
                    <ul class="ratingW">
                        <li class="on"><a href="javascript:void(0);">
                                <div class="star"></div>
                            </a></li>
                        <li class="on"><a href="javascript:void(0);">
                                <div class="star"></div>
                            </a></li>
                        <li class="on"><a href="javascript:void(0);">
                                <div class="star"></div>
                            </a></li>
                        <li><a href="javascript:void(0);">
                                <div class="star"></div>
                            </a></li>
                        <li><a href="javascript:void(0);">
                                <div class="star"></div>
                            </a></li>
                    </ul>

                </div>
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <div class="error-message"><?php echo isset($err['name']) ? $err['name'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <?php 
                        if(isset($_SESSION['dangnhap_danhgia'])){

                        
                    ?>
                    <input type="email" value="<?php echo $_SESSION['dangnhap_danhgia'];  ?>" class="form-control" id="email" name="email">
                    <?php } ?>
                    <div class="error-message"><?php echo isset($err['email']) ? $err['email'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="comment">Bình luận:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                </div>
                <button name="guidanhgia" type="submit" class="btn btn-primary">Gửi</button>
            </form>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#showReviewForm").click(function() {
                $("#reviewForm").toggle();
            });
        });

        function ratingStar(star) {
            star.click(function() {
                var stars = $('.ratingW').find('li')
                stars.removeClass('on');
                var thisIndex = $(this).parents('li').index();
                for (var i = 0; i <= thisIndex; i++) {
                    stars.eq(i).addClass('on');
                }
                putScoreNow(thisIndex + 1);
                $("#selectedRating").val(thisIndex + 1);

            });
        }

        function putScoreNow(i) {

            $('.scoreNow').html(i);

        }


        $(function() {
            if ($('.ratingW').length > 0) {
                ratingStar($('.ratingW li a'));
                putScoreNow();

            }
        });
    </script>
</body>

</html>