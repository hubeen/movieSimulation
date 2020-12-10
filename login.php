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
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">로그인</h5>
                        <form class="form-signin" name="login" method="POST" action="login_act.php">
                            <div class="form-label-group">
                                <input type="text" id="user_id" name="user_id" class="form-control" placeholder="Email address" required autofocus>
                                <label for="user_id">아이디</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password" required>
                                <label for="user_password">비밀번호</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">로그인</button>
                            <a class="d-block text-center mt-2 small" href="join.php">회원가입</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>