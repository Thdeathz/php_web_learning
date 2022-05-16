$(document).ready(function () {
  const days = 30;
  $.ajax({
    type: "GET",
    url: "get_selled_products.php",
    data: {days},
    dataType: 'json',
    success: function (response) {
      // Create the chart
      Highcharts.chart('container', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Tổng số sản phẩm bán được trong'
        },
        accessibility: {
          announceNewData: {
            enabled: true
          }
        },
        xAxis: {
          type: 'category'
        },
        yAxis: {
          title: {
            text: 'Tổng số bán được'
          }

        },
        legend: {
          enabled: false
        },
        plotOptions: {
          series: {
            borderWidth: 0,
            dataLabels: {
              enabled: true,
              format: '{point.y:.1f}%'
            }
          }
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: arrX,
        drilldown: {
          breadcrumbs: {
            position: {
              align: 'right'
            }
          },
          series: arrDetail,
        }
      });
    }
  });
});