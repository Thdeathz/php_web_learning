<?php
    require '../check_admin_login.php';
$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];
$type_names = explode(',', $_POST['type_names']);

$folder = 'photos/';
$file_extention = explode('.', $photo['name'])[1];
$file_name = time() . '.' .$file_extention;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name,photo,price,description,manufacturer_id)
values('$name','$file_name','$price','$description','$manufacturer_id')";

mysqli_query($connect,$sql);

$product_id = mysqli_insert_id($connect);
foreach($type_names as $type_name) {
    $sql = "select * from type where name = '$type_name'";
    $result = mysqli_query($connect,$sql);
    $type = mysqli_fetch_array($result);
    if(empty($type)){
        $sql = "insert into type(name) values ('$type_name')";
        mysqli_query($connect,$sql);
        $type_id = mysqli_insert_id($connect);
    } else {
        $type_id = $type['id'];
    }
    $sql = "insert into product_type(product_id,type_id)
    values('$product_id', '$type_id')";
    mysqli_query($connect,$sql);
}

mysqli_close($connect);

//header('location:index.php?success=Thêm thành công');