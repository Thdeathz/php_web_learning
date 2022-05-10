<div id="modal-signup" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <h1>Form đăng ký</h1>
            <span style="color: red">
                <?php
                    // Tạo session flash để hiển thị error
                    session_start(); 
                    if(isset($_SESSION['error'])) {?>
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);?>
                        <a href="sign_in.php">
                            Đăng nhập
                        </a>
                <?php }?>
            </span>
            <form id="form-signup" method="POST">
                Tên
                <input type="text" name="name">
                <br>
                Email
                <input type="email" name="email">
                <br>
                Sdt
                <input type="text" name="phone_number">
                <br>
                Địa chỉ
                <input type="text" name="address">
                <br>
                Mật khẩu
                <input type="password" name="password">
                <br>
                <button>Đăng ký</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#form-signup").submit(function(){
            event.preventDefault();
        });
    });
</script>