google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    // Define the chart to be drawn.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
      ['Mushrooms', 3],
      ['Onions', 1],
      ['Olives', 1], 
      ['Zucchini', 1],
      ['Pepperoni', 2]
    ]);

    var options = {'title':'How Much Pizza I Ate Last Night',
                     'width':400,
                     'height':300};

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);

    // Instantiate and draw the chart.
    // var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
    // chart.draw(data, options);
  }

//   var csv = google.visualization.dataTableToCsv(data);
//   console.log(csv);

//   function drawVisualization() {
//     var query = new google.visualization.Query(
//         'http://spreadsheets.google.com/tq?key=pCQbetd-CptGXxxQIG7VFIQ&pub=1');

//     // Apply query language statement.
//     query.setQuery('SELECT A,D WHERE D > 100 ORDER BY D');
    
//     // Send the query with a callback function.
//     query.send(handleQueryResponse);
//   }

//   function handleQueryResponse(response) {
//     if (response.isError()) {
//       alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
//       return;
//     }

//     // var data = response.getDataTable();
  
//   }
  