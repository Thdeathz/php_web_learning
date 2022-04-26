<?php
    session_start();
    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        require 'admin/connect.php';
        $sql = "select * from customers where token = '$token' limit 1";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);

        if($number_rows == 1){
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
            header("location:user.php");
            exit;
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in form</title>
</head>
<body>
    <h1>Form đăng nhập</h1>
    <?php if(isset($_GET['error'])) {?>
        <span style="color: red">
            <?php echo $_GET['error'];?>
            <a href="sign_up.php">
                Đăng ký
            </a>
        </span>
    <?php } else {?>
        <p>
            Bạn chưa có tài khoản ?
            <a href="sign_up.php">
                Đăng ký
            </a>
        </p>
    <?php }?>
    <form action="process_sign_in.php" method="POST">
        Email
        <input type="text" name="email">
        <br>
        Mật khẩu
        <input type="password" name="password">
        <br>
        <input type="checkbox" name="remember">
        Ghi nhớ đăng nhập
        <br>
        <button>Đăng nhập</button>
    </form>
    <br>
</body>
</html>