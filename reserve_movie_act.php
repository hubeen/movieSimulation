<?php
$conn = mysqli_connect("localhost", "movie", "qwer1234");
$dbname = "MOVIE_DB";
mysqli_set_charset($conn, 'UTF8');
mysqli_select_db($conn, $dbname);

session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$sql = "SELECT * FROM THEATER_INFO WHERE THEATER_NAME = '{$_POST["theater_name"]}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$theater_no = $row['THEATER_NO'];
$theater_name = $row['THEATER_NAME'];
$theater_loc = $row['THEATER_LOC'];
$theater_phone = $row['THEATER_PHONE'];

$sql = "SELECT * FROM MOVIE_INFO WHERE MOVIE_NAME = '{$_POST["movie_name"]}' and MOVIE_TIME = '{$_POST["movie_time"]}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$movie_no = $row['MOVIE_NO'];
$movie_name = $row['MOVIE_NAME'];
$movie_genre = $row['MOVIE_GENRE'];
$movie_director = $row['MOVIE_DIRECTOR'];
$movie_place = $row['MOVIE_PLACE'];
$movie_time = $row['MOVIE_TIME'];

$seat = $_POST['seat_sector'] . $_POST['seat_number'];

$sql = "SELECT MOVIE_NO,THEATER_NO,SEAT FROM MOVIE_RESERVATION WHERE MOVIE_NO = {$movie_no} AND THEATER_NO = {$theater_no} AND SEAT = '{$seat}'";
$result = mysqli_query($conn, $sql);
$array = mysqli_fetch_assoc($result);

if (!empty($array)) { //중복 좌석 확인
    echo "<script>alert('이미 예매된 좌석입니다. 다른 좌석을 선택해 주세요.'); location.href=('./reserve_movie_screen.php');</script>";
} else {
    $sql = "INSERT INTO MOVIE_RESERVATION(USER_ID,MOVIE_NO,THEATER_NO,SEAT) values('{$user_id}',{$movie_no},{$theater_no},'{$seat}')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('예매가 완료되었습니다.');</script>";
    $sql = "UPDATE USER_MEMBERSHIP SET MEMBERSHIP_POINT=MEMBERSHIP_POINT+100"; //예매할 때마다 멤버십 포인트 +100
    $result = mysqli_query($conn, $sql);
    $sql = "SELECT RESERVATION_NO FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}' AND MOVIE_NO = {$movie_no} AND THEATER_NO = {$theater_no} AND SEAT = '{$seat}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $reservation_no = $row['RESERVATION_NO'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>영화 예매 완료</title>
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
                        <h5 class="card-title text-center"><?php echo $user_name . "(" . $user_id; ?>)님 예매가 완료되었습니다. &nbsp;&nbsp;</h5>
                        <div class="form-signin">
                            <br><br><img src="<?php echo "./image/{$movie_name}.jpg" ?>" width="300" height="380" /><br><br>

                            예매번호: <?php echo $reservation_no; ?><br><br>

                            영화명: <?php echo $movie_name; ?><br><br>

                            영화장르: <?php echo $movie_genre; ?><br><br>

                            영화감독: <?php echo $movie_director; ?><br><br>

                            극장: <?php echo "$theater_name   ($movie_place)" ?><br><br>

                            좌석: <?php echo $seat; ?><br><br>

                            상영시간: <?php echo $movie_time; ?><br><br>

                            극장정보: <?php echo " $theater_loc  (Tell: $theater_phone)" ?><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>