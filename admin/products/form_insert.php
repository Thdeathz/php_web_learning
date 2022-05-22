<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">

    <title>Products insert</title>
</head>
<body>
    <?php
        require '../menu.php';
        require '../connect.php';
        $sql = "select * from manufacturers";
        $result_manufacturer = mysqli_query($connect,$sql);
    ?>

    <form action="process_insert.php" method="POST" enctype="multipart/form-data">
        Tên
        <input type="text" name="name">
        <br>
        Ảnh
        <input type="file" name="photo">
        <br>
        Giá
        <input type="text" name="price">
        <br>
        Mô tả
        <textarea name="description"></textarea>
        <br>
        Nhà sản xuất
        <select name="manufacturer_id">
            <?php foreach ($result_manufacturer as $each):?>
                <option value="<?php echo $each['id']?>">
                    <?php echo $each['name']?>
                </option>
            <?php endforeach?>
        </select>
        <br>
        Loại sản phẩm
        <input type="text" name="type_names" id="type">
        <br>
        <button type="submit">Thêm</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
    <script src="typeahead.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('form').keypress(function(event){
                if(event.keyCode == 13)
                    event.preventDefault();
            })
            var types = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'list_type.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
            });
            types.initialize();

            $('#type').tagsinput({
                typeaheadjs: {  
                    displayKey: 'name',
                    valueKey: 'name',
                    source: types.ttAdapter()
                },
                freeInput: true,
                trimValue: true
            });
        })
    </script>
</body>
</html>