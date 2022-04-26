<?php
session_start();
//unset($_SESSION['cart']);
$id = $_GET['id'];

if(empty($_SESSION['cart'][$id])) {
    require 'admin/connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $each['name'];
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
    mysqli_close($connect);
} else {
    $_SESSION['cart'][$id]['quantity'] += 1;
}

header("location:view_cart.php?success=Thêm thành công!!!");