<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <?php
        require '../menu.php';
        require '../connect.php';

        $page = 1;
        if(isset($_GET['trang'])){
            $page = $_GET['trang'];
        }

        //lấy số kết quả cần bỏ ra trên 1 trang
        $sql_number_orders = "select count(*) from products";
        $number_orders = mysqli_fetch_array(mysqli_query($connect,$sql_number_orders))['count(*)'];

        $number_orders_per_pages = 5;
        $pages = ceil($number_orders / $number_orders_per_pages);
        $pass = $number_orders_per_pages * ($page - 1);

        $sql = "select 
        products.*,
        manufacturers.name as manufacturer_name
        from products
        join manufacturers on products.manufacturer_id = manufacturers.id
        limit $number_orders_per_pages offset $pass";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý sản phẩm</h1>
    <a href="form_insert.php">
        Thêm
    </a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id']?></td>
                <td><?php echo $each['name']?></td>
                <td>
                    <img src="photos/<?php echo $each['photo']?>" alt="A image" width="100">
                </td>
                <td><?php echo $each['price']?></td>
                <td><?php echo $each['manufacturer_name']?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id']?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id']?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach?>
    </table>
    <?php for($i = 1; $i <= $pages; $i++){?>
        <a href="?trang=<?php echo $i?>"><?php echo $i?></a>    
    <?php }?>
</body>
</html>