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
    <ol style="list-style-type: none; text-align:center;">
        <li class="menu-guest" style="<?php if(!empty($_SESSION['id'])) {?>display: none;<?php }?>">
            <a href="index.php">
                Trang chủ
            </a>
        </li>
        <li class="menu-guest" style="<?php if(!empty($_SESSION['id'])) {?>display: none;<?php }?>">
            <button type="button" data-toggle="modal" data-target="#modal-signin">
                Đăng nhập
            </button>
        </li>
        <li class="menu-guest" style="<?php if(!empty($_SESSION['id'])) {?>display: none;<?php }?>">
            <button type="button" data-toggle="modal" data-target="#modal-signup">
                Đăng ký
            </button>
        </li>
        <li class="menu-user" style="<?php if(empty($_SESSION['id'])) {?>display: none;<?php }?>">
                Đăng nhập thành công ! 
                <br>
                Xin chào
                <span id="span-name" style="color: blue">
                    <?php echo $_SESSION['name'] ?? ''?>
                </span>
        </li>
        <li class="menu-user" style="<?php if(empty($_SESSION['id'])) {?>display: none;<?php }?>">
            <a href="sign_out.php">
                Đăng xuất
            </a>
        </li>
        <li class="menu-user" style="<?php if(empty($_SESSION['id'])) {?>display: none;<?php }?>">
            <a href="view_cart.php">
                Xem giỏ hàng
            </a>
        </li>
    </ol>
</div>

<?php 
    if(empty($_SESSION['id'])) { 
        include 'sign_up.php';
        include 'sign_in.php'; 
    }
?>