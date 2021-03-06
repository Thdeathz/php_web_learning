<div id="modal-signin" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h1>Form đăng nhập</h1>
                <p>
                    Bạn chưa có tài khoản ?
                    <button id="close-signin" type="button" data-toggle="modal" data-target="#modal-signup">
                        Đăng ký
                    </button>
                </p>
                <div class="alert alert-danger" id="signin-div-error" style="display: none;">

                </div>
            </div>
            <div class="modal-body">
                <form id="form-signin" method="POST">
                    Email
                    <input type="text" name="email">
                    <br>
                    Mật khẩu
                    <input type="password" name="password">
                    <br>
                    <input type="checkbox" name="remember">
                    Ghi nhớ đăng nhập
                    <br>
                    <button>Đăng nhập</button>
                    <a href="forgot_password.php">
                        Quên mật khẩu???
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Đóng modal đăng nhập mở modal đăng ký
        $("#close-signin").click(function(){
            $("#modal-signin").modal('toggle');
        });
        $("#form-signin").submit(function(){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "process_sign_in.php",
                data: $(this).serializeArray(),
                dataType: "html",
                success: function (response) {
                    if(response !== '1'){
                        $("#signin-div-error").text(response);
                        $("#signin-div-error").show();
                    } else {
                        //tạo đường dẫn đến trang khác
                        window.location.href = "user.php";
                    }
                }
            });
        });
    });
</script>