<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <?php 
        require '../connect.php';
        $order_id = $_GET['id'];
        $sql = "select 
        * 
        from order_product
        join products on products.id = order_product.product_id
        where order_id = '$order_id'";
        $result = mysqli_query($connect, $sql);
        $sum = 0;
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td>
                    <img src="../products/photos/<?php echo $each['photo']?>" alt="A image" width="100">
                </td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?></td>
                <td><?php echo $each['quantity']?></td>
                <td>
                    <?php 
                        $result = $each['price'] * $each['quantity'];
                        echo $result;
                        $sum += $result;
                    ?>
                </td>
            </tr>
        <?php endforeach?>
    </table>
    <h1>
        Tổng tiền: 
        $<?php echo $sum?>
    </h1>
</body>
</html>