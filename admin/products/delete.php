<?php
    require '../check_admin_login.php';
$id = $_GET['id'];
require '../connect.php';

//Xóa ảnh khỏi server
$sql_delete_photo = "select * from products where id = '$id'";
$delete_photo = mysqli_query($connect,$sql_delete_photo);
$each = mysqli_fetch_array($delete_photo);
$path_file = 'photos/' . $each['photo'];
unlink($path_file);

$sql = "delete from products where id = '$id'";
mysqli_query($connect,$sql);


mysqli_close($connect);

header('location:index.php?success=Xóa thành công');