<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form update</title>
</head>
<body>
    
    <?php 
        if(empty($_GET['id'])) {
            header('location:index.php?error=Không tìm thấy id');
            exit();
        }
        $id = $_GET['id'];
        require_once '../menu.php'; 
        require_once '../connect.php';
        $sql = "select * from manufacturers
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows === 1){
        $each = mysqli_fetch_array($result);
    ?>

    
    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $each['id']?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name']?>">
        <br>
        Địa chỉ
        <textarea name="address"><?php echo $each['address']?></textarea>
        <br>
        Điện thoại
        <input type="text" name="phone" value="<?php echo $each['phone']?>">
        <br>
        Ảnh
        <input type="text" name="photo" value="<?php echo $each['photo']?>">
        <br>
        <button>Cập nhật</button>
    </form>
    <?php } else {
        echo "Không tìm thấy bản ghi có id=$id trong DB";
    }?>
</body>
</html>