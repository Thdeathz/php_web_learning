$(document).ready(function () {
    $("#form-days").submit(function(){
        event.preventDefault();
        $.ajax({
            type: "GET",
            url: "get_turnover.php",
            data: $(this).serializeArray(),
            dataType: "json",
            success: function (response) {
                if(response !== 0){
                    $("#figure-1").show();
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
                } else {
                    $("#figure-1").hide();
                }
            }
        });
    }); 
});