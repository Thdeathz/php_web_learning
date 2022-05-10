<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Web hang cam</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        button {
            border: 0.5px solid;
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
        #tren form {
            margin-bottom: 10px;
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
    </script>
</body>
</html>