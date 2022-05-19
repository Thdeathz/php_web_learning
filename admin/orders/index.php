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

        $page = 1;
        if(isset($_GET['trang'])){
            $page = $_GET['trang'];
        }

        //lấy số kết quả cần bỏ ra trên 1 trang
        $sql_number_orders = "select count(*) from orders";
        $number_orders = mysqli_fetch_array(mysqli_query($connect,$sql_number_orders))['count(*)'];

        $number_orders_per_pages = 5;
        $pages = ceil($number_orders / $number_orders_per_pages);
        $pass = $number_orders_per_pages * ($page - 1);
        
        $sql = "select 
        orders.*,
        customers.name,
        customers.phone_number,
        customers.address
        from orders
        join customers on customers.id = orders.customer_id
        order by created_at desc
        limit $number_orders_per_pages offset $pass";
        $result = mysqli_query($connect, $sql);

        
    ?>
    <h1>Danh sách đơn đặt hàng</h1>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Thời gian đặt</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Xem</th>
            <th>Sửa</th>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['created_at'] ?></td>
                <td>
                    <?php echo $each['name_receiver'] ?><br>
                    <?php echo $each['phone_receiver'] ?><br>
                    <?php echo $each['address_receiver'] ?><br>
                </td>
                <td>
                    <?php echo $each['name'] ?><br>
                    <?php echo $each['phone_number'] ?><br>
                    <?php echo $each['address'] ?><br>
                </td>
                <td>
                    <?php 
                        switch ($each['status']) {
                            case 0:
                                echo "Mới đặt";
                                break;
                            case 1:
                                echo "Đã duyệt";
                                break;
                            case 2:
                                echo "Đã hủy";
                                break;
                        }
                    
                    ?>
                </td>
                <td>
                    <?php echo $each['total_price'] ?><br>
                </td>
                <td>
                    <a href="detail.php?id=<?php echo $each['id']?>" style="text-decoration:none;">
                        Xem
                    </a>
                </td>
                <td>
                    <?php if($each['status'] !== '1'){ ?>
                        <a href="update.php?id=<?php echo $each['id']?>&status=1" style="text-decoration:none;">
                            Duyệt
                        </a>
                    <?php }?>
                    <br>
                    <?php if($each['status'] !== '2'){ ?>
                        <a href="update.php?id=<?php echo $each['id']?>&status=2" style="text-decoration:none;">
                            Hủy
                        </a>
                    <?php }?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php for($i = 1; $i <= $pages; $i++){?>
        <a href="?trang=<?php echo $i?>"><?php echo $i?></a>    
    <?php }?>
</body>
</html>