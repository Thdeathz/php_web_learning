$(document).ready(function () {
  const days = 30;
  $.ajax({
    type: "GET",
    url: "get_selled_products.php",
    data: {days},
    dataType: 'json',
    success: function (response) {
      const arr = Object.values(response[0]);
      const arrDetail = [];
      Object.values(response[1]).forEach((each)=> {
        each.data = Object.values(each.data);
        arrDetail.push(each);
      })
      //Create the chart
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
              format: '{point.y:f}'
            }
          }
        },

        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b> of total<br/>'
        },

        series: [
          {
            name: "Browsers",
            colorByPoint: true,
            data: arr
          }
        ],
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