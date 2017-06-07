<?php
  $wedString = "";
  while ($row = $wedRes_reverse->fetch_assoc()) {
  	$time = strtotime($row['timeID']);
    $strform = date("G,i,s" , $time);
    $wedString.= '[['.$strform.'],'. $row['traffic']. '],';
  }

  ?>

<!-- Script for Making Chart -->
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawWednesday2);

function drawWednesday2() {

var data = new google.visualization.DataTable();
data.addColumn('timeofday', 'Time of Day');
data.addColumn('number', 'Motivation Level');

// Inserting the data with PHP
data.addRows([
  <?php echo substr($wedString,0,-1); ?>
]);

var options = {
width: 700,
height: 400,
title: 'Wednesday Traffic',
legend: {position: 'none'},
enableInteractivity: false,
chartArea: {
 width: '85%'
},
axes: {

},
hAxis: {
 // viewWindow: {
 //   min: new Date(2017, 6, 4, 2),
 //   max: new Date(2017, 6, 4, 23)
 // },
 gridlines: {
   count: -1,
   units: {
     hours: {format: ['hh:mm a', 'ha']},
     minutes: {format: ['hh:mm']}
   }
 }
}
};

var chart = new google.visualization.LineChart(
document.getElementById('chart_div_wed2'));

chart.draw(data, options);
}
</script>