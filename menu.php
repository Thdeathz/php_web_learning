<style>
    a {
        text-decoration: none;
    }
    /*Ngăn việc thêm padding-right sau khi đóng modal*/
    body { 
        padding-right: 0 !important; 
    }
</style>

<div id="tren">
    <div id="list-menu">
        <ol style="list-style-type: none; text-align:center;">
            <?php if(empty($_SESSION['id'])) {?>
                <li>
                    <a href="index.php">
                        Trang chủ
                    </a>
                </li>
                <li>
                    <button type="button" data-toggle="modal" data-target="#modal-signin">
                        Đăng nhập
                    </button>
                </li>
                <li>
                    <button type="button" data-toggle="modal" data-target="#modal-signup">
                        Đăng ký
                    </button>
                </li>
            <?php } else {?>
                <li>
                    Đăng nhập thành công ! 
                    <br>
                    Xin chào
                    <span id="span-name" style="color: blue">
                        <?php echo $_SESSION['name'] ?? ''?>
                    </span>
                </li>
                <li>
                    <a href="sign_out.php">
                        Đăng xuất
                    </a>
                </li>
                <li>
                    <a href="view_cart.php">
                        Xem giỏ hàng
                    </a>
                </li>
            <?php }?>
        </ol>
    </div>
    <?php include 'search.php'?>
</div>
<?php 
    if(empty($_SESSION['id'])) { 
        include 'sign_up.php';
        include 'sign_in.php'; 
    }
?>