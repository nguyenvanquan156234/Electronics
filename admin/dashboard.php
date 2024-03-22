<?php
session_start();
if (!isset($_SESSION['dangnhap'])) {
    header('Location: index.php');
}
?>

<?php
if (isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
} else {
    $dangxuat = '';
}

// Sử dụng toán tử so sánh (==) thay vì toán tử gán (=) để kiểm tra điều kiện
if ($dangxuat == 'dangxuat') {
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>

    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Tùy chỉnh CSS */
        body {
            padding-top: 56px;
            /* Đảm bảo không bị che phủ bởi navbar */
        }
    </style>
</head>

<body>

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="loader mt-5"></div>
            </div>
            <div class="col-md-4 mt-5">

                <div class="loader1"></div>
                <div class="loader1"></div>
                <div class="loader1"></div>


            </div>
            <div class="col-md-4 mt-5">

                <div aria-label="Orange and tan hamster running in a metal wheel" role="img" class="wheel-and-hamster">
                    <div class="wheel"></div>
                    <div class="hamster">
                        <div class="hamster__body">
                            <div class="hamster__head">
                                <div class="hamster__ear"></div>
                                <div class="hamster__eye"></div>
                                <div class="hamster__nose"></div>
                            </div>
                            <div class="hamster__limb hamster__limb--fr"></div>
                            <div class="hamster__limb hamster__limb--fl"></div>
                            <div class="hamster__limb hamster__limb--br"></div>
                            <div class="hamster__limb hamster__limb--bl"></div>
                            <div class="hamster__tail"></div>
                        </div>
                    </div>
                    <div class="spoke"></div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="scene">
                    <div class="forest">
                        <div class="tree tree1">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                        </div>

                        <div class="tree tree2">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>

                        <div class="tree tree3">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>

                        <div class="tree tree4">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>

                        <div class="tree tree5">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>

                        <div class="tree tree6">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>

                        <div class="tree tree7">
                            <div class="branch branch-top"></div>
                            <div class="branch branch-middle"></div>
                            <div class="branch branch-bottom"></div>
                        </div>
                    </div>

                    <div class="tent">
                        <div class="roof"></div>
                        <div class="roof-border-left">
                            <div class="roof-border roof-border1"></div>
                            <div class="roof-border roof-border2"></div>
                            <div class="roof-border roof-border3"></div>
                        </div>
                        <div class="entrance">
                            <div class="door left-door">
                                <div class="left-door-inner"></div>
                            </div>
                            <div class="door right-door">
                                <div class="right-door-inner"></div>
                            </div>
                        </div>
                    </div>

                    <div class="floor">
                        <div class="ground ground1"></div>
                        <div class="ground ground2"></div>
                    </div>

                    <div class="fireplace">
                        <div class="support"></div>
                        <div class="support"></div>
                        <div class="bar"></div>
                        <div class="hanger"></div>
                        <div class="smoke"></div>
                        <div class="pan"></div>
                        <div class="fire">
                            <div class="line line1">
                                <div class="particle particle1"></div>
                                <div class="particle particle2"></div>
                                <div class="particle particle3"></div>
                                <div class="particle particle4"></div>
                            </div>
                            <div class="line line2">
                                <div class="particle particle1"></div>
                                <div class="particle particle2"></div>
                                <div class="particle particle3"></div>
                                <div class="particle particle4"></div>
                            </div>
                            <div class="line line3">
                                <div class="particle particle1"></div>
                                <div class="particle particle2"></div>
                                <div class="particle particle3"></div>
                                <div class="particle particle4"></div>
                            </div>
                        </div>
                    </div>

                    <div class="time-wrapper">
                        <div class="time">
                            <div class="day"></div>
                            <div class="night">
                                <div class="moon"></div>
                                <div class="star star1 star-big"></div>
                                <div class="star star2 star-big"></div>
                                <div class="star star3 star-big"></div>
                                <div class="star star4"></div>
                                <div class="star star5"></div>
                                <div class="star star6"></div>
                                <div class="star star7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="holder">
                    <div class="candle">
                        <div class="blinking-glow"></div>
                        <div class="thread"></div>
                        <div class="glow"></div>
                        <div class="flame"></div>
                    </div>
                </div>

            </div>
        </div>


    </div>




    <!-- Link Bootstrap JS và Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<style>
    body {
        background-color: black;
    }
    .holder {
  margin: 12rem auto 0;
  width: 150px;
  height: 400px;
  position: relative;
}

.holder *, .holder *:before, .holder *:after {
  position: absolute;
  content: "";
}

.candle {
  bottom: 0;
  width: 150px;
  height: 300px;
  border-radius: 150px / 40px;
  -webkit-box-shadow: inset 20px -30px 50px 0 rgba(0, 0, 0, 0.4), inset -20px 0 50px 0 rgba(0, 0, 0, 0.4);
  box-shadow: inset 20px -30px 50px 0 rgba(0, 0, 0, 0.4), inset -20px 0 50px 0 rgba(0, 0, 0, 0.4);
  background: #190f02;
  background: -webkit-gradient(linear, left top, left bottom, from(#e48825), color-stop(#e78e0e), color-stop(#833c03), color-stop(50%, #4c1a03), to(#1c0900));
  background: linear-gradient(#e48825, #e78e0e, #833c03, #4c1a03 50%, #1c0900);
}

.candle:before {
  width: 100%;
  height: 40px;
  border-radius: 50%;
  border: 2px solid #d47401;
  background: #b86409;
  background: radial-gradient(#ffef80, #b86409 60%);
  background: radial-gradient(#eaa121, #8e4901 45%, #b86409 80%);
}

.candle:after {
  width: 34px;
  height: 10px;
  left: 50%;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  border-radius: 50%;
  top: 14px;
  -webkit-box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5);
  background: radial-gradient(rgba(0, 0, 0, 0.6), transparent 45%);
}

.thread {
  width: 6px;
  height: 36px;
  top: -17px;
  left: 50%;
  z-index: 1;
  border-radius: 40% 40% 0 0;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  background: #121212;
  background: -webkit-gradient(linear, left top, left bottom, from(#d6994a), color-stop(#4b232c), color-stop(#121212), color-stop(black), color-stop(90%, #e8bb31));
  background: linear-gradient(#d6994a, #4b232c, #121212, black, #e8bb31 90%);
}

.flame {
  width: 24px;
  height: 120px;
  left: 50%;
  -webkit-transform-origin: 50% 100%;
  -ms-transform-origin: 50% 100%;
  transform-origin: 50% 100%;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  bottom: 100%;
  border-radius: 50% 50% 20% 20%;
  background: rgba(255, 255, 255, 1);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(80%, white), to(transparent));
  background: linear-gradient(white 80%, transparent);
  -webkit-animation: moveFlame 6s linear infinite, enlargeFlame 5s linear infinite;
  animation: moveFlame 6s linear infinite, enlargeFlame 5s linear infinite;
}

.flame:before {
  width: 100%;
  height: 100%;
  border-radius: 50% 50% 20% 20%;
  -webkit-box-shadow: 0 0 15px 0 rgba(247, 93, 0, .4), 0 -6px 4px 0 rgba(247, 128, 0, .7);
  box-shadow: 0 0 15px 0 rgba(247, 93, 0, .4), 0 -6px 4px 0 rgba(247, 128, 0, .7);
}

@-webkit-keyframes moveFlame {
  0%, 100% {
    -webkit-transform: translateX(-50%) rotate(-2deg);
    transform: translateX(-50%) rotate(-2deg);
  }

  50% {
    -webkit-transform: translateX(-50%) rotate(2deg);
    transform: translateX(-50%) rotate(2deg);
  }
}

@keyframes moveFlame {
  0%, 100% {
    -webkit-transform: translateX(-50%) rotate(-2deg);
    transform: translateX(-50%) rotate(-2deg);
  }

  50% {
    -webkit-transform: translateX(-50%) rotate(2deg);
    transform: translateX(-50%) rotate(2deg);
  }
}

@-webkit-keyframes enlargeFlame {
  0%, 100% {
    height: 120px;
  }

  50% {
    height: 140px;
  }
}

@keyframes enlargeFlame {
  0%, 100% {
    height: 120px;
  }

  50% {
    height: 140px;
  }
}

.glow {
  width: 26px;
  height: 60px;
  border-radius: 50% 50% 35% 35%;
  left: 50%;
  top: -48px;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  background: rgba(0, 133, 255, .7);
  -webkit-box-shadow: 0 -40px 30px 0 #dc8a0c, 0 40px 50px 0 #dc8a0c, inset 3px 0 2px 0 rgba(0, 133, 255, .6), inset -3px 0 2px 0 rgba(0, 133, 255, .6);
  box-shadow: 0 -40px 30px 0 #dc8a0c, 0 40px 50px 0 #dc8a0c, inset 3px 0 2px 0 rgba(0, 133, 255, .6), inset -3px 0 2px 0 rgba(0, 133, 255, .6);
}

.glow:before {
  width: 70%;
  height: 60%;
  left: 50%;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  bottom: 0;
  border-radius: 50%;
  background: rgba(0, 0, 0, 0.35);
}

.blinking-glow {
  width: 100px;
  height: 180px;
  left: 50%;
  top: -55%;
  -webkit-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  border-radius: 50%;
  background: #ff6000;
  -webkit-filter: blur(50px);
  -moz-filter: blur(60px);
  -o-filter: blur(60px);
  -ms-filter: blur(60px);
  filter: blur(60px);
  -webkit-animation: blinkIt .1s infinite;
  animation: blinkIt .1s infinite;
}

@-webkit-keyframes blinkIt {
  50% {
    opacity: .8;
  }
}

@keyframes blinkIt {
  50% {
    opacity: .8;
  }
}



    @keyframes stageBackground {

        0%,
        10%,
        90%,
        100% {
            background-color: #00B6BB;
        }

        25%,
        75% {
            background-color: #0094bd;
        }
    }

    @keyframes earthRotation {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes sunrise {

        0%,
        10%,
        90%,
        100% {
            box-shadow: 0 0 0 25px #5ad6bd, 0 0 0 40px #4acead, 0 0 0 60px rgba(74, 206, 173, 0.6), 0 0 0 90px rgba(74, 206, 173, 0.3);
        }

        25%,
        75% {
            box-shadow: 0 0 0 0 #5ad6bd, 0 0 0 0 #4acead, 0 0 0 0 rgba(74, 206, 173, 0.6), 0 0 0 0 rgba(74, 206, 173, 0.3);
        }
    }

    @keyframes moonOrbit {
        25% {
            transform: rotate(-60deg);
        }

        50% {
            transform: rotate(-60deg);
        }

        75% {
            transform: rotate(-120deg);
        }

        0%,
        100% {
            transform: rotate(-180deg);
        }
    }

    @keyframes nightTime {

        0%,
        90% {
            opacity: 0;
        }

        50%,
        75% {
            opacity: 1;
        }
    }

    @keyframes hotPan {

        0%,
        90% {
            background-color: #74667e;
        }

        50%,
        75% {
            background-color: #b2241c;
        }
    }

    @keyframes heat {

        0%,
        90% {
            box-shadow: inset 0 0 0 0 rgba(255, 255, 255, 0.3);
        }

        50%,
        75% {
            box-shadow: inset 0 -2px 0 0 white;
        }
    }

    @keyframes smoke {

        0%,
        50%,
        90%,
        100% {
            opacity: 0;
        }

        50%,
        75% {
            opacity: 0.7;
        }
    }

    @keyframes fire {

        0%,
        90%,
        100% {
            opacity: 0;
        }

        50%,
        75% {
            opacity: 1;
        }
    }

    @keyframes treeShake {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-2deg);
        }

        40% {
            transform: rotate(4deg);
        }

        50% {
            transform: rotate(-4deg);
        }

        60% {
            transform: rotate(6deg);
        }

        75% {
            transform: rotate(-6deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    @keyframes fireParticles {
        0% {
            height: 30%;
            opacity: 1;
            top: 75%;
        }

        25% {
            height: 25%;
            opacity: 0.8;
            top: 40%;
        }

        50% {
            height: 15%;
            opacity: 0.6;
            top: 20%;
        }

        75% {
            height: 10%;
            opacity: 0.3;
            top: 0;
        }

        100% {
            opacity: 0;
        }
    }

    @keyframes fireLines {

        0%,
        25%,
        75%,
        100% {
            bottom: 0;
        }

        50% {
            bottom: 5%;
        }
    }

    .scene {
        display: flex;
        margin: 0 auto 80px auto;
        justify-content: center;
        align-items: flex-end;
        width: 400px;
        height: 300px;
        position: relative;
    }

    .forest {
        display: flex;
        width: 75%;
        height: 90%;
        position: relative;
    }

    .tree {
        display: block;
        width: 50%;
        position: absolute;
        bottom: 0;
        opacity: 0.4;
    }

    .tree .branch {
        width: 80%;
        height: 0;
        margin: 0 auto;
        padding-left: 40%;
        padding-bottom: 50%;
        overflow: hidden;
    }

    .tree .branch:before {
        content: "";
        display: block;
        width: 0;
        height: 0;
        margin-left: -600px;
        border-left: 600px solid transparent;
        border-right: 600px solid transparent;
        border-bottom: 950px solid #000;
    }

    .tree .branch.branch-top {
        transform-origin: 50% 100%;
        animation: treeShake 0.5s linear infinite;
    }

    .tree .branch.branch-middle {
        width: 90%;
        padding-left: 45%;
        padding-bottom: 65%;
        margin: 0 auto;
        margin-top: -25%;
    }

    .tree .branch.branch-bottom {
        width: 100%;
        padding-left: 50%;
        padding-bottom: 80%;
        margin: 0 auto;
        margin-top: -40%;
    }

    .tree1 {
        width: 31%;
    }

    .tree1 .branch-top {
        transition-delay: 0.3s;
    }

    .tree2 {
        width: 39%;
        left: 9%;
    }

    .tree2 .branch-top {
        transition-delay: 0.4s;
    }

    .tree3 {
        width: 32%;
        left: 24%;
    }

    .tree3 .branch-top {
        transition-delay: 0.5s;
    }

    .tree4 {
        width: 37%;
        left: 34%;
    }

    .tree4 .branch-top {
        transition-delay: 0.6s;
    }

    .tree5 {
        width: 44%;
        left: 44%;
    }

    .tree5 .branch-top {
        transition-delay: 0.7s;
    }

    .tree6 {
        width: 34%;
        left: 61%;
    }

    .tree6 .branch-top {
        transition-delay: 0.2s;
    }

    .tree7 {
        width: 24%;
        left: 76%;
    }

    .tree7 .branch-top {
        transition-delay: 0.1s;
    }

    .tent {
        width: 60%;
        height: 25%;
        position: absolute;
        bottom: -0.5%;
        right: 15%;
        z-index: 1;
        text-align: right;
    }

    .roof {
        display: inline-block;
        width: 45%;
        height: 100%;
        margin-right: 10%;
        position: relative;
        /*bottom: 0;
  right: 9%;*/
        z-index: 1;
        border-top: 4px solid #4D4454;
        border-right: 4px solid #4D4454;
        border-left: 4px solid #4D4454;
        border-top-right-radius: 6px;
        transform: skew(30deg);
        box-shadow: inset -3px 3px 0px 0px #F7B563;
        /*background: linear-gradient(
    to bottom, 
    rgba(246,212,132,1) 0%,
    rgba(246,212,132,1) 24%,
    rgba(#F0B656,1) 25%,
    rgba(#F0B656,1) 74%,
    rgba(235,151,53,1) 75%,
    rgba(235,151,53,1) 100%
  );*/
        background: #f6d484;
    }

    .roof:before {
        content: "";
        width: 70%;
        height: 70%;
        position: absolute;
        top: 15%;
        left: 15%;
        z-index: 0;
        border-radius: 10%;
        background-color: #E78C20;
    }

    .roof:after {
        content: "";
        height: 75%;
        width: 100%;
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1;
        background: linear-gradient(to bottom, rgba(231, 140, 32, 0.4) 0%, rgba(231, 140, 32, 0.4) 64%, rgba(231, 140, 32, 0.8) 65%, rgba(231, 140, 32, 0.8) 100%);
    }

    .roof-border-left {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        width: 1%;
        height: 125%;
        position: absolute;
        top: 0;
        left: 35.7%;
        z-index: 1;
        transform-origin: 50% 0%;
        transform: rotate(35deg);
    }

    .roof-border-left .roof-border {
        display: block;
        width: 100%;
        border-radius: 2px;
        border: 2px solid #4D4454;
    }

    .roof-border-left .roof-border1 {
        height: 40%;
    }

    .roof-border-left .roof-border2 {
        height: 10%;
    }

    .roof-border-left .roof-border3 {
        height: 40%;
    }

    .door {
        width: 55px;
        height: 92px;
        position: absolute;
        bottom: 2%;
        overflow: hidden;
        z-index: 0;
        transform-origin: 0 105%;
    }

    .left-door {
        transform: rotate(35deg);
        position: absolute;
        left: 13.5%;
        bottom: -3%;
        z-index: 0;
    }

    .left-door .left-door-inner {
        width: 100%;
        height: 100%;
        transform-origin: 0 105%;
        transform: rotate(-35deg);
        position: absolute;
        top: 0;
        overflow: hidden;
        background-color: #EDDDC2;
    }

    .left-door .left-door-inner:before {
        content: "";
        width: 15%;
        height: 100%;
        position: absolute;
        top: 0;
        right: 0;
        background: repeating-linear-gradient(#D4BC8B, #D4BC8B 4%, #E0D2A8 5%, #E0D2A8 10%);
    }

    .left-door .left-door-inner:after {
        content: "";
        width: 50%;
        height: 100%;
        position: absolute;
        top: 15%;
        left: 10%;
        transform: rotate(25deg);
        background-color: #fff;
    }

    .right-door {
        height: 89px;
        right: 21%;
        transform-origin: 0 105%;
        transform: rotate(-30deg) scaleX(-1);
        position: absolute;
        bottom: -3%;
        z-index: 0;
    }

    .right-door .right-door-inner {
        width: 100%;
        height: 100%;
        transform-origin: 0 120%;
        transform: rotate(-30deg);
        position: absolute;
        bottom: 0px;
        overflow: hidden;
        background-color: #EFE7CF;
    }

    .right-door .right-door-inner:before {
        content: "";
        width: 50%;
        height: 100%;
        position: absolute;
        top: 15%;
        right: -28%;
        z-index: 1;
        transform: rotate(15deg);
        background-color: #524A5A;
    }

    .right-door .right-door-inner:after {
        content: "";
        width: 50%;
        height: 100%;
        position: absolute;
        top: 15%;
        right: -20%;
        transform: rotate(20deg);
        background-color: #fff;
    }

    .floor {
        width: 80%;
        position: absolute;
        right: 10%;
        bottom: 0;
        z-index: 1;
    }

    .floor .ground {
        position: absolute;
        border-radius: 2px;
        border: 2px solid #4D4454;
    }

    .floor .ground.ground1 {
        width: 65%;
        left: 0;
    }

    .floor .ground.ground2 {
        width: 30%;
        right: 0;
    }

    .fireplace {
        display: block;
        width: 24%;
        height: 20%;
        position: absolute;
        left: 5%;
    }

    .fireplace:before {
        content: "";
        display: block;
        width: 8%;
        position: absolute;
        bottom: -4px;
        left: 2%;
        border-radius: 2px;
        border: 2px solid #4D4454;
        background: #4D4454;
    }

    .fireplace .support {
        display: block;
        height: 105%;
        width: 2px;
        position: absolute;
        bottom: -5%;
        left: 10%;
        border: 2px solid #4D4454;
    }

    .fireplace .support:before {
        content: "";
        width: 100%;
        height: 15%;
        position: absolute;
        top: -18%;
        left: -4px;
        border-radius: 2px;
        border: 2px solid #4D4454;
        transform-origin: 100% 100%;
        transform: rotate(45deg);
    }

    .fireplace .support:after {
        content: "";
        width: 100%;
        height: 15%;
        position: absolute;
        top: -18%;
        left: 0px;
        border-radius: 2px;
        border: 2px solid #4D4454;
        transform-origin: 0 100%;
        transform: rotate(-45deg);
    }

    .fireplace .support:nth-child(1) {
        left: 85%;
    }

    .fireplace .bar {
        width: 100%;
        height: 2px;
        border-radius: 2px;
        border: 2px solid #4D4454;
    }

    .fireplace .hanger {
        display: block;
        width: 2px;
        height: 25%;
        margin-left: -4px;
        position: absolute;
        left: 50%;
        border: 2px solid #4D4454;
    }

    .fireplace .pan {
        display: block;
        width: 25%;
        height: 50%;
        border-radius: 50%;
        border: 4px solid #4D4454;
        position: absolute;
        top: 25%;
        left: 35%;
        overflow: hidden;
        animation: heat 5s linear infinite;
    }

    .fireplace .pan:before {
        content: "";
        display: block;
        height: 53%;
        width: 100%;
        position: absolute;
        bottom: 0;
        z-index: -1;
        border-top: 4px solid #4D4454;
        background-color: #74667e;
        animation: hotPan 5s linear infinite;
    }

    .fireplace .smoke {
        display: block;
        width: 20%;
        height: 25%;
        position: absolute;
        top: 25%;
        left: 37%;
        background-color: white;
        filter: blur(5px);
        animation: smoke 5s linear infinite;
    }

    .fireplace .fire {
        display: block;
        width: 25%;
        height: 120%;
        position: absolute;
        bottom: 0;
        left: 33%;
        z-index: 1;
        animation: fire 5s linear infinite;
    }

    .fireplace .fire:before {
        content: "";
        display: block;
        width: 100%;
        height: 2px;
        position: absolute;
        bottom: -4px;
        z-index: 1;
        border-radius: 2px;
        border: 1px solid #efb54a;
        background-color: #efb54a;
    }

    .fireplace .fire .line {
        display: block;
        width: 2px;
        height: 100%;
        position: absolute;
        bottom: 0;
        animation: fireLines 1s linear infinite;
    }

    .fireplace .fire .line2 {
        left: 50%;
        margin-left: -1px;
        animation-delay: 0.3s;
    }

    .fireplace .fire .line3 {
        right: 0;
        animation-delay: 0.5s;
    }

    .fireplace .fire .line .particle {
        height: 10%;
        position: absolute;
        top: 100%;
        z-index: 1;
        border-radius: 2px;
        border: 2px solid #efb54a;
        animation: fireParticles 0.5s linear infinite;
    }

    .fireplace .fire .line .particle1 {
        animation-delay: 0.1s;
    }

    .fireplace .fire .line .particle2 {
        animation-delay: 0.3s;
    }

    .fireplace .fire .line .particle3 {
        animation-delay: 0.6s;
    }

    .fireplace .fire .line .particle4 {
        animation-delay: 0.9s;
    }

    .time-wrapper {
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
    }

    .time {
        display: block;
        width: 100%;
        height: 200%;
        position: absolute;
        transform-origin: 50% 50%;
        transform: rotate(270deg);
        animation: earthRotation 5s linear infinite;
    }

    .time .day {
        display: block;
        width: 20px;
        height: 20px;
        position: absolute;
        top: 20%;
        left: 40%;
        border-radius: 50%;
        box-shadow: 0 0 0 25px #5ad6bd, 0 0 0 40px #4acead, 0 0 0 60px rgba(74, 206, 173, 0.6), 0 0 0 90px rgba(74, 206, 173, 0.3);
        animation: sunrise 5s ease-in-out infinite;
        background-color: #ef9431;
    }

    .time .night {
        animation: nightTime 5s ease-in-out infinite;
    }

    .time .night .star {
        display: block;
        width: 4px;
        height: 4px;
        position: absolute;
        bottom: 10%;
        border-radius: 50%;
        background-color: #fff;
    }

    .time .night .star-big {
        width: 6px;
        height: 6px;
    }

    .time .night .star1 {
        right: 23%;
        bottom: 25%;
    }

    .time .night .star2 {
        right: 35%;
        bottom: 18%;
    }

    .time .night .star3 {
        right: 47%;
        bottom: 25%;
    }

    .time .night .star4 {
        right: 22%;
        bottom: 20%;
    }

    .time .night .star5 {
        right: 18%;
        bottom: 30%;
    }

    .time .night .star6 {
        right: 60%;
        bottom: 20%;
    }

    .time .night .star7 {
        right: 70%;
        bottom: 23%;
    }

    .time .night .moon {
        display: block;
        width: 25px;
        height: 25px;
        position: absolute;
        bottom: 22%;
        right: 33%;
        border-radius: 50%;
        transform: rotate(-60deg);
        box-shadow: 9px 9px 3px 0 white;
        filter: blur(1px);
        animation: moonOrbit 5s ease-in-out infinite;
    }

    .time .night .moon:before {
        content: "";
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        bottom: -9px;
        left: 9px;
        border-radius: 50%;
        box-shadow: 0 0 0 5px rgba(255, 255, 255, 0.05), 0 0 0 15px rgba(255, 255, 255, 0.05), 0 0 0 25px rgba(255, 255, 255, 0.05), 0 0 0 35px rgba(255, 255, 255, 0.05);
        background-color: rgba(255, 255, 255, 0.2);
    }

    .wheel-and-hamster {
        --dur: 1s;
        position: relative;
        width: 12em;
        height: 12em;
        font-size: 14px;
    }

    .wheel,
    .hamster,
    .hamster div,
    .spoke {
        position: absolute;
    }

    .wheel,
    .spoke {
        border-radius: 50%;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .wheel {
        background: radial-gradient(100% 100% at center, hsla(0, 0%, 60%, 0) 47.8%, hsl(0, 0%, 60%) 48%);
        z-index: 2;
    }

    .hamster {
        animation: hamster var(--dur) ease-in-out infinite;
        top: 50%;
        left: calc(50% - 3.5em);
        width: 7em;
        height: 3.75em;
        transform: rotate(4deg) translate(-0.8em, 1.85em);
        transform-origin: 50% 0;
        z-index: 1;
    }

    .hamster__head {
        animation: hamsterHead var(--dur) ease-in-out infinite;
        background: hsl(30, 90%, 55%);
        border-radius: 70% 30% 0 100% / 40% 25% 25% 60%;
        box-shadow: 0 -0.25em 0 hsl(30, 90%, 80%) inset,
            0.75em -1.55em 0 hsl(30, 90%, 90%) inset;
        top: 0;
        left: -2em;
        width: 2.75em;
        height: 2.5em;
        transform-origin: 100% 50%;
    }

    .hamster__ear {
        animation: hamsterEar var(--dur) ease-in-out infinite;
        background: hsl(0, 90%, 85%);
        border-radius: 50%;
        box-shadow: -0.25em 0 hsl(30, 90%, 55%) inset;
        top: -0.25em;
        right: -0.25em;
        width: 0.75em;
        height: 0.75em;
        transform-origin: 50% 75%;
    }

    .hamster__eye {
        animation: hamsterEye var(--dur) linear infinite;
        background-color: hsl(0, 0%, 0%);
        border-radius: 50%;
        top: 0.375em;
        left: 1.25em;
        width: 0.5em;
        height: 0.5em;
    }

    .hamster__nose {
        background: hsl(0, 90%, 75%);
        border-radius: 35% 65% 85% 15% / 70% 50% 50% 30%;
        top: 0.75em;
        left: 0;
        width: 0.2em;
        height: 0.25em;
    }

    .hamster__body {
        animation: hamsterBody var(--dur) ease-in-out infinite;
        background: hsl(30, 90%, 90%);
        border-radius: 50% 30% 50% 30% / 15% 60% 40% 40%;
        box-shadow: 0.1em 0.75em 0 hsl(30, 90%, 55%) inset,
            0.15em -0.5em 0 hsl(30, 90%, 80%) inset;
        top: 0.25em;
        left: 2em;
        width: 4.5em;
        height: 3em;
        transform-origin: 17% 50%;
        transform-style: preserve-3d;
    }

    .hamster__limb--fr,
    .hamster__limb--fl {
        clip-path: polygon(0 0, 100% 0, 70% 80%, 60% 100%, 0% 100%, 40% 80%);
        top: 2em;
        left: 0.5em;
        width: 1em;
        height: 1.5em;
        transform-origin: 50% 0;
    }

    .hamster__limb--fr {
        animation: hamsterFRLimb var(--dur) linear infinite;
        background: linear-gradient(hsl(30, 90%, 80%) 80%, hsl(0, 90%, 75%) 80%);
        transform: rotate(15deg) translateZ(-1px);
    }

    .hamster__limb--fl {
        animation: hamsterFLLimb var(--dur) linear infinite;
        background: linear-gradient(hsl(30, 90%, 90%) 80%, hsl(0, 90%, 85%) 80%);
        transform: rotate(15deg);
    }

    .hamster__limb--br,
    .hamster__limb--bl {
        border-radius: 0.75em 0.75em 0 0;
        clip-path: polygon(0 0, 100% 0, 100% 30%, 70% 90%, 70% 100%, 30% 100%, 40% 90%, 0% 30%);
        top: 1em;
        left: 2.8em;
        width: 1.5em;
        height: 2.5em;
        transform-origin: 50% 30%;
    }

    .hamster__limb--br {
        animation: hamsterBRLimb var(--dur) linear infinite;
        background: linear-gradient(hsl(30, 90%, 80%) 90%, hsl(0, 90%, 75%) 90%);
        transform: rotate(-25deg) translateZ(-1px);
    }

    .hamster__limb--bl {
        animation: hamsterBLLimb var(--dur) linear infinite;
        background: linear-gradient(hsl(30, 90%, 90%) 90%, hsl(0, 90%, 85%) 90%);
        transform: rotate(-25deg);
    }

    .hamster__tail {
        animation: hamsterTail var(--dur) linear infinite;
        background: hsl(0, 90%, 85%);
        border-radius: 0.25em 50% 50% 0.25em;
        box-shadow: 0 -0.2em 0 hsl(0, 90%, 75%) inset;
        top: 1.5em;
        right: -0.5em;
        width: 1em;
        height: 0.5em;
        transform: rotate(30deg) translateZ(-1px);
        transform-origin: 0.25em 0.25em;
    }

    .spoke {
        animation: spoke var(--dur) linear infinite;
        background: radial-gradient(100% 100% at center, hsl(0, 0%, 60%) 4.8%, hsla(0, 0%, 60%, 0) 5%),
            linear-gradient(hsla(0, 0%, 55%, 0) 46.9%, hsl(0, 0%, 65%) 47% 52.9%, hsla(0, 0%, 65%, 0) 53%) 50% 50% / 99% 99% no-repeat;
    }

    /* Animations */
    @keyframes hamster {

        from,
        to {
            transform: rotate(4deg) translate(-0.8em, 1.85em);
        }

        50% {
            transform: rotate(0) translate(-0.8em, 1.85em);
        }
    }

    @keyframes hamsterHead {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(0);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(8deg);
        }
    }

    @keyframes hamsterEye {

        from,
        90%,
        to {
            transform: scaleY(1);
        }

        95% {
            transform: scaleY(0);
        }
    }

    @keyframes hamsterEar {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(0);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(12deg);
        }
    }

    @keyframes hamsterBody {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(0);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(-2deg);
        }
    }

    @keyframes hamsterFRLimb {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(50deg) translateZ(-1px);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(-30deg) translateZ(-1px);
        }
    }

    @keyframes hamsterFLLimb {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(-30deg);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(50deg);
        }
    }

    @keyframes hamsterBRLimb {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(-60deg) translateZ(-1px);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(20deg) translateZ(-1px);
        }
    }

    @keyframes hamsterBLLimb {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(20deg);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(-60deg);
        }
    }

    @keyframes hamsterTail {

        from,
        25%,
        50%,
        75%,
        to {
            transform: rotate(30deg) translateZ(-1px);
        }

        12.5%,
        37.5%,
        62.5%,
        87.5% {
            transform: rotate(10deg) translateZ(-1px);
        }
    }

    @keyframes spoke {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(-1turn);
        }
    }

    /* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} */
    .loader {
        width: 120px;
        height: 150px;
        background-color: #fff;
        background-repeat: no-repeat;
        background-image: linear-gradient(#ddd 50%, #bbb 51%),
            linear-gradient(#ddd, #ddd), linear-gradient(#ddd, #ddd),
            radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%),
            radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%),
            radial-gradient(ellipse at center, #aaa 25%, #eee 26%, #eee 50%, #0000 55%);
        background-position: 0 20px, 45px 0, 8px 6px, 55px 3px, 75px 3px, 95px 3px;
        background-size: 100% 4px, 1px 23px, 30px 8px, 15px 15px, 15px 15px, 15px 15px;
        position: relative;
        border-radius: 6%;
        animation: shake 3s ease-in-out infinite;
        transform-origin: 60px 180px;
    }

    .loader:before {
        content: "";
        position: absolute;
        left: 5px;
        top: 100%;
        width: 7px;
        height: 5px;
        background: #aaa;
        border-radius: 0 0 4px 4px;
        box-shadow: 102px 0 #aaa;
    }

    .loader:after {
        content: "";
        position: absolute;
        width: 95px;
        height: 95px;
        left: 0;
        right: 0;
        margin: auto;
        bottom: 20px;
        background-color: #bbdefb;
        background-image: linear-gradient(to right, #0004 0%, #0004 49%, #0000 50%, #0000 100%),
            linear-gradient(135deg, #64b5f6 50%, #607d8b 51%);
        background-size: 30px 100%, 90px 80px;
        border-radius: 50%;
        background-repeat: repeat, no-repeat;
        background-position: 0 0;
        box-sizing: border-box;
        border: 10px solid #DDD;
        box-shadow: 0 0 0 4px #999 inset, 0 0 6px 6px #0004 inset;
        animation: spin 3s ease-in-out infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg)
        }

        50% {
            transform: rotate(360deg)
        }

        75% {
            transform: rotate(750deg)
        }

        100% {
            transform: rotate(1800deg)
        }
    }

    @keyframes shake {

        65%,
        80%,
        88%,
        96% {
            transform: rotate(0.5deg)
        }

        50%,
        75%,
        84%,
        92% {
            transform: rotate(-0.5deg)
        }

        0%,
        50%,
        100% {
            transform: rotate(0)
        }
    }



    .loader1 {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 10;
        width: 160px;
        height: 100px;
        margin-left: -80px;
        margin-top: -50px;
        border-radius: 5px;
        background: #1e3f57;
        animation: dot1_ 3s cubic-bezier(0.55, 0.3, 0.24, 0.99) infinite;
    }

    .loader1:nth-child(2) {
        z-index: 11;
        width: 150px;
        height: 90px;
        margin-top: -45px;
        margin-left: -75px;
        border-radius: 3px;
        background: #3c517d;
        animation-name: dot2_;
    }

    .loader1:nth-child(3) {
        z-index: 12;
        width: 40px;
        height: 20px;
        margin-top: 50px;
        margin-left: -20px;
        border-radius: 0 0 5px 5px;
        background: #6bb2cd;
        animation-name: dot3_;
    }

    @keyframes dot1_ {

        3%,
        97% {
            width: 160px;
            height: 100px;
            margin-top: -50px;
            margin-left: -80px;
        }

        30%,
        36% {
            width: 80px;
            height: 120px;
            margin-top: -60px;
            margin-left: -40px;
        }

        63%,
        69% {
            width: 40px;
            height: 80px;
            margin-top: -40px;
            margin-left: -20px;
        }
    }

    @keyframes dot2_ {

        3%,
        97% {
            height: 90px;
            width: 150px;
            margin-left: -75px;
            margin-top: -45px;
        }

        30%,
        36% {
            width: 70px;
            height: 96px;
            margin-left: -35px;
            margin-top: -48px;
        }

        63%,
        69% {
            width: 32px;
            height: 60px;
            margin-left: -16px;
            margin-top: -30px;
        }
    }

    @keyframes dot3_ {

        3%,
        97% {
            height: 20px;
            width: 40px;
            margin-left: -20px;
            margin-top: 50px;
        }

        30%,
        36% {
            width: 8px;
            height: 8px;
            margin-left: -5px;
            margin-top: 49px;
            border-radius: 8px;
        }

        63%,
        69% {
            width: 16px;
            height: 4px;
            margin-left: -8px;
            margin-top: -37px;
            border-radius: 10px;
        }
    }
</style>