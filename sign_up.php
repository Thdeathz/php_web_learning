<div id="modal-signup" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h1>Form đăng ký</h1>
                <div class="alert alert-danger" id="signup-div-error" style="display: none;">

                </div>
            </div>
            <div class="modal-body">
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
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#form-signup").submit(function(){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "process_sign_up.php",
                data: $(this).serializeArray(),
                dataType: "html",
                success: function (response) {
                    if(response !== '1'){
                        $("#signup-div-error").text(response);
                        $("#signup-div-error").show();
                    } else {
                        $("#modal-signup").modal('toggle');
                        $(".menu-guest").hide();
                        $(".menu-user").show();
                        $("#span-name").text($("input[name='name']")).val();
                    }
                }
            });
        });
    });
</script>