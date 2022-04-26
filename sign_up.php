<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up form</title>
</head>
<body>
    <h1>Form đăng ký</h1>
    <span style="color: red">
        <?php
            // Tạo session flash để hiển thị error
            session_start(); 
            if(isset($_SESSION['error'])) {?>
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);?>
                <a href="sign_in.php">
                    Đăng nhập
                </a>
        <?php }?>
    </span>
    <form action="process_sign_up.php" method="POST">
        Tên
        <input type="text" name="name">
        <br>
        Email
        <input type="email" name="email">
        <br>
        Sdt
        <input type="text" name="phone_number">
        <br>
        Địa chỉ
        <input type="text" name="address">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        <button>Đăng ký</button>
    </form>
</body>
</html>