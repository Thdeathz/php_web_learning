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
        <div id="tren">
        <h1>Đăng nhập thành công ! 
            <br>
            Xin chào
            <span style="color: blue">
                <?php echo $_SESSION['name']?>
            </span>
        </h1>
        <br>
            <a href="sign_out.php">Đăng xuất</a>
        <br>
            <a href="view_cart.php">Xem giỏ hàng</a>
        </div>
        <?php include 'products.php'?>
        <?php include 'footer.php'?>
    </div>
</body>
</html>