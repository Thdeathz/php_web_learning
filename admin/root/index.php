<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="hight_chart_basic_line.css">
    <link rel="stylesheet" href="hight_chart_column_with_drilldown.css">
    <title>Admin</title>
</head>
<body>
    Đây là giao diện admin
    <?php  
        require '../menu.php';
        require '../connect.php';
    ?>
    <div>
        Thống kê doanh thu theo:
        <form id="form-days" method="GET">
            <select id="select-days" name="days">
                <option value="7">7 ngày</option>
                <option value="15">15 ngày</option>
                <option value="30">30 ngày</option>
                <option value="0" selected>Ẩn thống kê</option>
            </select>
            <button>Thống kê</button>
        </form>
    </div>
    <figure id="figure-1" class="highcharts-figure">
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <div id="container"></div>
</figure>
</body>
<!-- hight chart basic line Start -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="hight_chart_basic_line.js"></script>
<!-- hight chart basic line End -->

<!-- hight chart column with drilldown Start -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="hight_chart_column_with_drilldown.js"></script>
<!-- hight chart column with drilldown End -->
</html>