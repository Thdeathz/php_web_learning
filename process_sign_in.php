<?php

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
    $remember = true;
} else {
    $remember = false;
}

require 'admin/connect.php';

//kiểm tra tài khoản
$sql = "select * from customers
where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 1){
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['name'] = $each['name'];
    $_SESSION['id'] = $each['id'];
    $id = $each['id'];
    // tạo cookie ghi nhớ đăng nhập
    if($remember) {
        $token = uniqid('user_',true);
        $sql = "update customers
        set
        token = '$token'
        where
        id = '$id'";
        mysqli_query($connect,$sql);
        setcookie('remember', $token, time() + 86400 * 30);
    }

    header("location:user.php");
    exit;
}

header("location:sign_in.php?error=Tài khoản mật khẩu không chính xác !");