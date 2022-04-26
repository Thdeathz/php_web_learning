<?php
session_start();
$cart = $_SESSION['cart'];
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
    <table border="1" width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($cart as $id => $each): ?>
            <tr>
                <td>
                    <img src="admin/products/photos/<?php echo $each['photo']?>" alt="A image" width="100">
                </td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?></td>
                <td>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id?>&type=decre" style="text-decoration: none;">--</a>
                    <?php echo $each['quantity']?>
                    <a href="update_quantity_in_cart.php?id=<?php echo $id?>&type=incre" style="text-decoration: none;">+</a>
                </td>
                <td><?php echo $each['price'] * $each['quantity']?></td>
                <td>
                    <a href="delete_from_cart.php?id=<?php echo $id?>" style="text-decoration: none;">X</a>
                </td>
            </tr>
        <?php endforeach?>
    </table>
    <a href="user.php?id=<?php echo $id?>" style="text-decoration: none;"><----Quay lai</a>
</body>
</html>