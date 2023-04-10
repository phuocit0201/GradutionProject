$(document).ready(function(){
  var days = JSON.parse($('#data-statistics').attr('days'));
  var parameters = JSON.parse($('#data-statistics').attr('parameters'));
  console.log(days, parameters);
    $(function () {
      //-------------
      //- BAR CHART -
      //-------------
      var areaChartData = {
        labels  : days,
        datasets: [
          {
            label               : 'doanh thu',
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