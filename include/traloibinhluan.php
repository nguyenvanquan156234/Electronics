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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '';
    }
    if (isset($_POST['traloi'])) {
        $err = [];
        $rating = isset($_POST["rating"]) ? $_POST["rating"] : '';
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $comment = isset($_POST["comment"]) ? $_POST["comment"] : '';

            mysqli_query($mysqli,"INSERT INTO tbl_binhluan(binhluan_name,binhluan_email, binhluan_rating,binhluan_noidung,danhgia_id)
                        VALUES ('$name','$email ','$rating','$comment','$id')
            ");

            header('Location: index.php');
        
    }
    ?>
    <div class="container mt-5">
            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }else{
                    $id = '';
                }
                $sql_danhgia = mysqli_query($mysqli,"SELECT * FROM tbl_danhgia WHERE danhgia_id='$id'" );
                while ($row_danhgia = mysqli_fetch_array($sql_danhgia)) {
                    echo '<li>';
                    echo '<h5>Viết trả lời bình luận của:' . $row_danhgia['danhgia_name'] . '</h5>';
                    for ($star = 1; $star <= $row_danhgia['danhgia_rating']; $star++) {
                        echo '<i class="fas fa-star';
                        if ($row_danhgia['danhgia_rating'] >= $star) {
                            echo ' active'; // Thêm class 'active' nếu đánh giá là >= star
                        }
                        echo '"></i>';
                    }
                    echo '<p>' . $row_danhgia['danhgia_binhluan'] . '</p>';
                    
                    // Lấy các bình luận tương ứng với mỗi đánh giá
                    
            
                    // Thêm liên kết để trả lời bình luận
                    echo '<a href="index.php?quanly=traloi&id=' . $row_danhgia['danhgia_id'] . '">Trả lời</a>';
            
            
                  
            
                    // Kiểm tra xem có phải đánh giá đang được trả lời hay không
                    
            
                    echo '</li>';
                    
                }

            ?>
            
            <?php ?>
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
                    <div class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <?php 
                        if(isset($_SESSION['dangnhap_danhgia'])){

                        
                    ?>
                    <input type="email" value="<?php echo $_SESSION['dangnhap_danhgia'];  ?>" class="form-control" id="email" name="email">
                    <?php } ?>
                    <div class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="comment">trả lời Bình luận:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                </div>
                <button name="traloi" type="submit" class="btn btn-primary">Gửi</button>
            </form>
       <?php ob_end_flush(); ?>
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