<?php
    require '../check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturers</title>
</head>
<body>
    Đây là khu vực quản lý nhà sản xuất
    <br>
    <a href="form_insert.php">
        Thêm
    </a>
    
    <?php
        include '../menu.php';
        require '../connect.php';
        $page = 1;
        if(isset($_GET['trang'])){
            $page = $_GET['trang'];
        }

        //lấy số kết quả cần bỏ ra trên 1 trang
        $sql_number_orders = "select count(*) from manufacturers";
        $number_orders = mysqli_fetch_array(mysqli_query($connect,$sql_number_orders))['count(*)'];

        $number_orders_per_pages = 5;
        $pages = ceil($number_orders / $number_orders_per_pages);
        $pass = $number_orders_per_pages * ($page - 1);

        $sql = "
        select 
        * 
        from manufacturers
        limit $number_orders_per_pages offset $pass";
        $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id']?></td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['address']?></td>
                <td><?php echo $each['phone']?></td>
                <td>
                    <img src="<?php echo $each['photo']?>" alt="A image" width="100">
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id']?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php for($i = 1; $i <= $pages; $i++){?>
        <a href="?trang=<?php echo $i?>"><?php echo $i?></a>    
    <?php }?>
</body>
</html>