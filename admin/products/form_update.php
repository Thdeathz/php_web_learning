<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products insert</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        require '../menu.php';
        require '../connect.php';
        $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);

        $sql = "select * from manufacturers";
        $manufacturers = mysqli_query($connect,$sql);
    ?>

    <form action="proccess_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id']?>">
        Tên
        <input type="text" name="name" value="<?php echo $each['name']?>">
        <br>
        <img src="photos/<?php echo $each['photo']?>" alt="A image" width="100">
        <br>
        Đổi ảnh khác
        <input type="file" name="photo">
        <input type="hidden" name="photo_old" value="<?php echo $each['photo']?>">
        <br>
        Giá
        <input type="text" name="price" value="<?php echo $each['price']?>">
        <br>
        Mô tả
        <textarea name="description"><?php echo $each['description']?>"</textarea>
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach ($manufacturers as $manufacturer):?>
                <option value="<?php echo $manufacturer['id']?>"
                    <?php if($each['manufacturer_id'] == $manufacturer['id']) {?> 
                        selected
                    <?php }?>
                >   
                    <?php echo $manufacturer['name']?>
                </option>
            <?php endforeach?>
        </select>
        <br>
        <button>Cập nhật</button>
    </form>
</body>
</html>