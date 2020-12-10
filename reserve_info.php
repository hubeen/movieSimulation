<?php
$conn = mysqli_connect("localhost", "movie", "qwer1234");
$dbname = "MOVIE_DB";
mysqli_set_charset($conn, 'UTF8');
mysqli_select_db($conn, $dbname);

session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>영화 예매 정보</title>
    <meta charset="UTF-8">
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
            <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">예약 정보</h5>
                        <div class="form-signin">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>예매번호</th>
                                        <th>영화제목</th>
                                        <th>장르</th>
                                        <th>감독</th>
                                        <th>극장</th>
                                        <th>좌석</th>
                                        <th>상영시간</th>
                                        <th>예매취소</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}'";
                                    $result2 = mysqli_query($conn, $sql);

                                    if (empty($row2 = mysqli_fetch_assoc($result2))) {
                                        echo "<tr><td colspan=10>예약정보 없음</td></tr>";
                                    } else {
                                        $sql = "SELECT * FROM MOVIE_RESERVATION WHERE USER_ID = '{$user_id}'";
                                        $result2 = mysqli_query($conn, $sql);

                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $reservation_no = $row2['RESERVATION_NO'];
                                            $movie_no = $row2['MOVIE_NO'];
                                            $theater_no = $row2['THEATER_NO'];
                                            $seat = $row2['SEAT'];

                                            $sql = "SELECT * FROM MOVIE_INFO where MOVIE_NO = '{$movie_no}'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $movie_name = $row['MOVIE_NAME'];
                                            $movie_genre = $row['MOVIE_GENRE'];
                                            $movie_director = $row['MOVIE_DIRECTOR'];
                                            $movie_place = $row['MOVIE_PLACE'];
                                            $movie_time = $row['MOVIE_TIME'];

                                            $sql = "SELECT * FROM THEATER_INFO where THEATER_NO = '{$theater_no}'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            $theater_name = $row['THEATER_NAME'];


                                            echo "
                            <tr>
                                <td>{$reservation_no}</td>
                                <td>{$movie_name}</td>
                                <td>{$movie_genre}</td>
                                <td>{$movie_director}</td>
                                <td>{$theater_name} ({$movie_place})</td>
                                <td>{$seat}</td>
                                <td>{$movie_time}</td>
                                <td>
                                    <form method='POST' action='reserve_delete.php'>
                                        <input type='hidden' name='delete' value='{$reservation_no}'>
                                        <input type='submit' style='width:80px; height:30px; background-color:yellow; border-color:yellow; border-radius:30px;' value='예매취소'>
                                    </form>
                                </td>
                            </tr>
                        ";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </table>
</body>

</html>