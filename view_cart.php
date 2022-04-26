<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<?php
    session_start(); 
    if(empty($_SESSION['cart'])) {
?>
    <h1>Không có gì trong giỏ hàng hãy thêm sản phẩm!!!</h1>
    <br>
    <a href="user.php" style="text-decoration: none;"><----Quay lai</a>
    <?php } else {
        $cart = $_SESSION['cart'];
        $sum = 0;    
    ?>
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
                <td>
                    <?php 
                        $result = $each['price'] * $each['quantity'];
                        echo $result;
                        $sum += $result;
                    ?>
                </td>
                <td>
                    <a href="delete_from_cart.php?id=<?php echo $id?>" style="text-decoration: none;">X</a>
                </td>
            </tr>
        <?php endforeach?>
    </table>
    <a href="user.php" style="text-decoration: none;"><----Quay lai</a>
</body>
<h1>
    Tổng tiền: 
    $<?php echo $sum?>
</h1>
<?php 
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<form action="process_checkout.php" method="POST">
    Tên người nhận
    <input type="text" name="name_receiver" value="<?php echo $each['name']?>">
    <br>
    SĐT người nhận
    <input type="text" name="phone_receiver" value="<?php echo $each['phone_number']?>">
    <br>
    Địa chỉ người nhận
    <input type="text" name="address_receiver" value="<?php echo $each['address']?>">
    <br>
    <button type="submit">Đặt hàng</button>
</form>
<?php } ?>
</html>