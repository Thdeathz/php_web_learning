<style>
    *{
        border: 0;
        margin: 0;
        box-sizing: border-box;
    }
    #giua {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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
$sql = "select * from products";
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
                <br>
            </a>
            <?php if(isset($_SESSION['id'])) {?>
                <a href="add_to_card.php?id=<?php echo $each['id']?>">
                    Thêm vào giỏ hàng
                </a>
            <?php } ?>
        </div>
    <?php endforeach?>
</div>