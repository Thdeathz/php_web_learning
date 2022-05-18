<style>
    *{
        border: 0;
        margin: 0;
        box-sizing: border-box;
        text-align: center !important;
    }
    .tung_san_pham img {
        width: 20%;
        height: 20%;
    }
</style>

<?php 
require 'admin/connect.php';
$id = $_GET['id'];
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>

<div id="giua">
    <div class="tung_san_pham">
        <h1>
            <?php echo $each['name']?>
        </h1>
        <img src="admin/products/photos/<?php echo $each['photo']?>" alt="A image">
        <p><?php echo $each['price']?>VND</p>
        <p><?php echo $each['description']?></p>
        <?php if(!empty($_SESSION['id'])) {?>
            <br>
            <button 
                    data-id='<?php echo $each['id']?>'
                    class="btn-add-to-cart"
                >
                    Thêm vào giỏ hàng
                </button>
        <?php }?>
    </div>
    <a 
        href="<?php if(!empty($_SESSION['id'])) {?>
                user.php
            <?php } else {?>
                index.php
            <?php }?>" 
        style="text-decoration: none;"
    >
        <----Quay lai
    </a>
</div>