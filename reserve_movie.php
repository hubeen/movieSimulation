<?php
session_start();
$conn = mysqli_connect("localhost", "movie", "qwer1234");
$dbname = "MOVIE_DB";
mysqli_set_charset($conn, 'UTF8');
mysqli_select_db($conn, $dbname);
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>영화 예매</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
        }

        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
        }

        .card-signin .card-body {
            padding: 2rem;
        }

        .form-signin {
            width: 100%;
        }

        .form-signin .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input {
            height: auto;
            border-radius: 2rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }

        /* Fallback for Edge
-------------------------------------------------- */

        @supports (-ms-ime-align: auto) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input::-ms-input-placeholder {
                color: #777;
            }
        }

        /* Fallback for IE
-------------------------------------------------- */

        @media all and (-ms-high-contrast: none),
        (-ms-high-contrast: active) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input:-ms-input-placeholder {
                color: #777;
            }
        }
    </style>
    <script>
        function displayImage(elem) {
            var image = document.getElementById("canvas");
            image.src = "./image/" + elem.value + ".jpg";
        }
    </script>
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
                    <a class="nav-link" onclick="history.back();">뒤로가기</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_info.php"><?php echo "$user_name 님" ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout_act.php">로그아웃</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-8 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">영화 예매 정보 입력</h5>
                        <div class="form-signin">
                            <form name="reserve" method="POST" action="reserve_movie_act.php">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="./image/좌석배치도.png" alt="좌석배치도" width="300" height="310" />
                                            </td>
                                            <td>
                                                <img id="canvas" src="./image/기생충.jpg" width="230" height="310" /> &nbsp;&nbsp;&nbsp;
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td>
                                                극장
                                            </td>
                                            <td>
                                                <select class='form-control' name="theater_name">
                                                    <?php
                                                    $sql = "SELECT THEATER_NAME FROM THEATER_INFO";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row["THEATER_NAME"]}'>{$row["THEATER_NAME"]}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                영화
                                            </td>
                                            <td>
                                                <select class='form-control' name="movie_name" onchange="displayImage(this);">
                                                    <?php
                                                    $sql = "SELECT DISTINCT MOVIE_NAME FROM MOVIE_INFO";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row["MOVIE_NAME"]}'>{$row["MOVIE_NAME"]}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>시간</td>
                                            <td>
                                                <select class='form-control' name="movie_time">
                                                    <?php
                                                    $sql = "SELECT DISTINCT MOVIE_TIME FROM MOVIE_INFO";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row["MOVIE_TIME"]}'>{$row["MOVIE_TIME"]}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="seat_sector" placeholder="구역(A, B, C)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="seat_number" placeholder="자리번호">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </br><button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">예매</button>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>