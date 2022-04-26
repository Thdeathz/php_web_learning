<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

require 'admin/connect.php';

//kiểm tra email đã tồn tại chưa
$sql = "select count(*) from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if($number_rows == 1){
    session_start();
    $_SESSION['error'] = 'Email đã được đăng ký!';
    header("location:sign_up.php");
    exit;
}

// lưu dữ liệu vào trong DB
$sql = "insert into customers(name,email,password,phone_number,address)
value ('$name','$email','$password','$phone_number','$address')";
mysqli_query($connect,$sql);

//Tạo phiên đăng nhập với session
$sql = "select id from customers
where email = '$email'";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
mysqli_close($connect);

header("location:sign_in.php");

