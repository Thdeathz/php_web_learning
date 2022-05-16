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
    <title>Admin</title>
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>
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
                <option value="7" selected>7 ngày</option>
                <option value="15">15 ngày</option>
                <option value="30">30 ngày</option>
            </select>
            <button>Thống kê</button>
        </form>
    </div>
    <figure class="highcharts-figure">
    <div id="container"></div>
</figure>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#form-days").submit(function(){
            event.preventDefault();
            $.ajax({
                type: "GET",
                url: "get_turnover.php",
                data: $(this).serializeArray(),
                dataType: "json",
                success: function (response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);
                    Highcharts.chart('container', {
                        title: {
                            text: 'Thống kê doang thu theo ngày'
                        },

                        yAxis: {
                        title: {
                            text: 'Doanh thu'
                        }
                        },

                        xAxis: {
                            categories: arrX
                        },

                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },

                        plotOptions: {
                            series: {
                                label: {
                                connectorAllowed: false
                                },
                            }
                        },

                        series: [{
                            name: '',
                            data: arrY
                        }],

                        responsive: {
                            rules: [{
                                condition: {
                                maxWidth: 500
                                },
                                chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                                }
                            }]
                        }

                    });
                }
            });
        }); 
    });
</script>
</html>