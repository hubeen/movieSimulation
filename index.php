<?php
    session_start();
    if (isset($_SESSION['user_id']) || isset($_SESSION['user_name'])) {
        echo "<meta http-equiv='refresh' content='0;url=menu.php'>";
        exit;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>영화 예매 사이트</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Make the image fully responsive */

        .carousel-inner {
            background: #007bff;
        }

        .carousel-inner {
            text-align: center;
        }

        .carousel-inner img {
            margin: auto;
        }

        body {
            background: #007bff;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="index.php">영화 예매 사이트</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navb" class="navbar-collapse collapse hide">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="join.php"><span class="fas fa-user"></span> 회원가입</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><span class="fas fa-sign-in-alt"></span> 로그인</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/어벤져스_앤드게임.jpg" width="230" height="300" alt="어벤져스_앤드게임 ">
                    <img src="./image/토이스토리4.jpg" alt="토이스토리4" width="230" height="300">
                    <img src="./image/기생충.jpg" alt="기생충" width="230" height="300">
                </div>
                <div class="carousel-item">
                    <img src="./image/알라딘.jpg" alt="알라딘" width="230" height="300">
                    <img src="./image/고질라_킹 오브 몬스터.jpg" alt="고질라_킹" width="230" height="300">
                    <img src="./image/로켓맨.jpg" alt="로켓맨" width="230" height="300">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
</body>

</html>