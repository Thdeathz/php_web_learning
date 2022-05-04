<?php

//Lấy đường dẫn hiện tại trang đang trỏ tới
function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}

$email = $_POST['email'];

require 'admin/connect.php';

$sql = "select id, name from customers where email = '$email'";

$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 1)
{
    //lấy tên và id của khách hàng đồng thời xóa dữ liệu đã tồn tại trong bảng quên mật khẩu
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "delete from forgot_password where customer_id = '$id'";
    mysqli_query($connect,$sql);

    //tạo token mới và thêm lại vào trong bảng quên mật khẩu
    $token = uniqid();
    $sql = "insert into forgot_password (customer_id, token) 
    values('$id','$token')";
    mysqli_query($connect,$sql);

    $link = current_url() . '/change_new_password.php?token=' . $token;

    require 'mail.php';
    $title = "Đổi mật khẩu mới!!!";
    $content = "Bấm vào <a href='$link'>đây</a> để thay đổi mật khẩu!";
    sendmail($email, $name, $title, $content);

    header('location:sign_in.php?success=Gửi mail xác nhận thành công');
}