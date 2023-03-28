$(document).ready(function(){
  var days = JSON.parse($('#data-statistics').attr('days'));
  var parameters = JSON.parse($('#data-statistics').attr('parameters'));
  console.log(days, parameters);
    $(function () {
      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.

      // var donutData        = {
      //   labels: [
      //       'Chrome',
      //       'IE',
      //       'FireFox',
      //       'Safari',
      //       'Opera',
      //       'Navigator',
      //   ],
      //   datasets: [
      //     {
      //       data: [700,500,400,600,300,100],
      //       backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
      //     }
      //   ]
      // }

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.

      // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      // var pieData        = donutData;
      // var pieOptions     = {
      //   maintainAspectRatio : false,
      //   responsive : true,
      // }

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.

      // new Chart(pieChartCanvas, {
      //   type: 'pie',
      //   data: pieData,
      //   options: pieOptions
      // })
  
      //-------------
      //- BAR CHART -
      //-------------
      var areaChartData = {
        labels  : days,
        datasets: [
          // {
          //   label               : 'Digital Goods',
            // backgroundColor     : 'rgba(60,141,188,0.9)',
            // borderColor         : 'rgba(60,141,188,0.8)',
          //   pointRadius          : false,
          //   pointColor          : '#3b8bba',
          //   pointStrokeColor    : 'rgba(60,141,188,1)',
          //   pointHighlightFill  : '#fff',
          //   pointHighlightStroke: 'rgba(60,141,188,1)',
          //   data                : [28, 48, 40, 19, 86, 27, 90]
          // },
          {
            label               : 'Electronics',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : parameters
          },
        ]
      }
  
      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var barChartData = $.extend(true, {}, areaChartData);
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d');
      var stackedBarChartData = $.extend(true, {}, barChartData);
  
      var stackedBarChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }
  
      new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      });
    });
  });