
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
            background: linear-gradient(120deg, #8EC5FC 0%, #E0C3FC 100%);
            height: 100vh;
            overflow: hidden;
        }
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            background: white;
            border-radius: 15px;
        }
        .center h1{
            text-align: center;
            pad: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }
        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .txt_field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .txt_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }
        .txt_field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #8EC5FC;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }
        .txt_field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
            top: -5px;
            color: #2691d9;
        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before{
            width: 100%;
        }
        .pass{
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }
        .pass:hover{
            text-decoration: underline;
        }
        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
        input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
        }
        .link_dangky{
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }
        .link_dangky a{
            color: #2691d9;
            text-decoration: none;
        }
        .link_dangky a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="POST" action="{{ route('customLogin') }}">
            @csrf
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label for="">Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label for="">Mật khẩu</label>
            </div>
            <div class="pass">Quên mật khẩu?</div>
            <input type="submit" value="login">
            <div class="link_dangky">
                Chưa có tài khoản? <a href="{{route('registration')}}">Đăng Ký</a>
            </div>
        </form>
    </div>
</body>
</html>