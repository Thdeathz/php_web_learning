<style>
    *{
        border: 0;
        margin: 0;
        box-sizing: border-box;
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
        </div>
</div>