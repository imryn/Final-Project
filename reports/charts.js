google.charts.load('current', {packages: ['corechart']});


  function drawChart(chartData) {
    // Define the chart to be drawn.
    if(chartData instanceof Array){
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'notes');      
      data.addRows(chartData);
      var options = {
                      'title':'How Much Notes For Each Child',
                      // 'width':400,
                      // 'height':300
                    };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);


  }
}
