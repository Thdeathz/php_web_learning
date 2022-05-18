<?php 
    session_start();
    if(empty($_SESSION['id'])){
        header("location:sign_in.php?error=Bạn cần đăng nhập!");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>User pages</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
        #tong{
            width: 100%;
            height: 700px;
            background: black;
            text-align: center;
        }
        #tren{
            width: 100%;
            height: 20%;
            background: rgb(0, 204, 204);
        }
        #giua{
            width: 100%;
            height: 70%;
            background: rgb(128, 255, 212);
        }
        #duoi{
            width: 100%;
            height: 10%;
            background: rgb(133, 173, 173);
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php include 'menu.php'?>
        <?php include 'products.php'?>
        <?php include 'footer.php'?>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add-to-cart").click(function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {id},
                    // dataType: "dataType",
                })
                .done(function(response){
                    if(response == 1){
                        alert('Thêm thành công');
                    } else {
                        alert(response);
                    }
                });
            });
        });
    </script>
</body>
</html>