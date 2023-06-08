
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
        <h1>Đăng ký</h1>
        <form action="#"method="POST" enctype="multipart/form-data">
            <div class="txt_field">
                <input type="text" name="user_fullname" required>
                <span></span>
                <label for="">Tên người dùng</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label for="">Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="user_password" required>
                <span></span>
                <label for="">Password</label>
            </div>
            <div class="txt_field">
                <h5>Ảnh đại diện</h5>
                <input type="file" name="user_avatar" required>
                <span></span>
            </div>
            <input type="submit" value="login">
            <div class="link_dangky">
                Đã có tài khoản <a href="{{route('login')}}">Đăng nhập</a>
            </div>
        </form>
    </div>
</body>
</html>