<style>
    *{
        border: 0;
        margin: 0;
        box-sizing: border-box;
    }


    #giua {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }

    .tung_san_pham {
        border: 1px solid;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }
    .tung_san_pham img {
        width: 20%;
        height: 20%;
    }
    .tung_san_pham a {
        text-decoration: none;
    }
</style>

<?php 
require 'admin/connect.php';
$page = 1;
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}

//lấy số kết quả cần bỏ ra trên 1 trang
$sql_number_orders = "select count(*) from products";
$number_orders = mysqli_fetch_array(mysqli_query($connect,$sql_number_orders))['count(*)'];

$number_orders_per_pages = 6;
$pages = ceil($number_orders / $number_orders_per_pages);
$pass = $number_orders_per_pages * ($page - 1);

$sql = "
select 
* 
from products
limit $number_orders_per_pages offset $pass";
$result = mysqli_query($connect,$sql);
?>

<div id="giua">
    <?php foreach ($result as $each): ?>
        <div class="tung_san_pham">
            <h1>
                <?php echo $each['name']?>
            </h1>
            <img src="admin/products/photos/<?php echo $each['photo']?>" alt="A image">
            <p><?php echo $each['price']?>VND</p>
            <a href="product.php?id=<?php echo $each['id']?>">
                Xem chi tiết >>>
            </a>
            <?php if(!empty($_SESSION['id'])) {?>
                <br>
                <button 
                    data-id='<?php echo $each['id']?>'
                    class="btn-add-to-cart"
                >
                    Thêm vào giỏ hàng
                </button>
            <?php } ?>
        </div>
    <?php endforeach?>
</div>