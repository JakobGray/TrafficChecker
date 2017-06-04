<?php
  require_once('database.php');

  $query = 'SELECT * FROM times';
  $statement = $db->prepare($query);
  //$statement->bindValue();
  $statement->execute();
  $results = $statement->fetchAll();
  $statement->closeCursor();

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <button id="change">Change View Window</button>
  <div id="chart_div"></div>


  <?php
  $string = "";
  foreach ($results as $result) :
      $time = strtotime($result['timeID']);
      $strform = date("Y,n,j,G,i" , $time);
      $string.= '[new Date('.$strform.'),'. $result['traffic']. '],';

  endforeach;
  ?>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
data.addColumn('datetime', 'Time of Day');
data.addColumn('number', 'Motivation Level');

data.addRows([
  <?php echo substr($string,0,-1); ?>
]);

var options = {
width: 900,
height: 500,
legend: {position: 'none'},
enableInteractivity: false,
chartArea: {
 width: '85%'
},
hAxis: {
 viewWindow: {
   min: new Date(2017, 6, 4, 12),
   max: new Date(2017, 6, 4, 23)
 },
 gridlines: {
   count: -1,
   units: {
     days: {format: ['MMM dd']},
     hours: {format: ['HH:mm', 'ha']},
   }
 },
 minorGridlines: {
   units: {
     hours: {format: ['hh:mm:ss a', 'ha']},
     minutes: {format: ['HH:mm a Z', ':mm']}
   }
 }
}
};

var chart = new google.visualization.LineChart(
document.getElementById('chart_div'));

chart.draw(data, options);

var button = document.getElementById('change');
var isChanged = false;

button.onclick = function () {
if (!isChanged) {
 options.hAxis.viewWindow.min = new Date(2017, 6, 3, 11);
 options.hAxis.viewWindow.max = new Date(2017, 6, 3, 23);
 isChanged = true;
} else {
 options.hAxis.viewWindow.min = new Date(2017, 6, 3, 11),
 options.hAxis.viewWindow.max = new Date(2017, 6, 3, 23)
 isChanged = false;
}
chart.draw(data, options);
};
}
</script>
