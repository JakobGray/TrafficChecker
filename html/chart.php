<?php

$mysqli = new mysqli("localhost","mgs_user","pa55word","maps");
// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM monday;";
$query .= "SELECT * FROM tuesday;";
$query .= "SELECT * FROM wednesday;";
$query .= "SELECT * FROM thursday;";
$query .= "SELECT * FROM friday;";
$query .= "SELECT * FROM saturday;";
$query .= "SELECT * FROM sunday;";

$query .= "SELECT * FROM monday_reverse;";
$query .= "SELECT * FROM tuesday_reverse;";
$query .= "SELECT * FROM wednesday_reverse;";
$query .= "SELECT * FROM thursday_reverse;";
$query .= "SELECT * FROM friday_reverse;";
$query .= "SELECT * FROM saturday_reverse;";
$query .= "SELECT * FROM sunday_reverse;";


// Execute multi query
if ($mysqli->multi_query($query))
{
  $monRes=$mysqli->store_result();  $mysqli->next_result();
  $tuesRes=$mysqli->store_result();  $mysqli->next_result();
  $wedRes=$mysqli->store_result();  $mysqli->next_result();
  $thurRes=$mysqli->store_result();  $mysqli->next_result();
  $friRes=$mysqli->store_result();  $mysqli->next_result();
  $satRes=$mysqli->store_result();  $mysqli->next_result();
  $sunRes=$mysqli->store_result();  $mysqli->next_result();

  $monRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $tuesRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $wedRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $thurRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $friRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $satRes_reverse=$mysqli->store_result();  $mysqli->next_result();
  $sunRes_reverse=$mysqli->store_result();
}

$mysqli->close();
?>

<!-- HTML START -->
<html>
<head>
  <title>Traffic Info </title> 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <header><h1>Traffic Tables</h1></header>

    <main>
      <div style="overflow:auto;">
      <table>
      <tr>
        <td><div id="chart_div_mon"></div></td>
        <td><div id="chart_div_tues"></div></td>
        <td><div id="chart_div_wed"></div></td>
        <td><div id="chart_div_thur"></div></td>
        <td><div id="chart_div_fri"></div></td>
        <td><div id="chart_div_sat"></div></td>
        <td><div id="chart_div_sun"></div></td>
      </tr>
      <tr>
        <td><div id="chart_div_mon2"></div></td>
        <td><div id="chart_div_tues2"></div></td>
        <td><div id="chart_div_wed2"></div></td>
        <td><div id="chart_div_thur2"></div></td>
        <td><div id="chart_div_fri2"></div></td>
        <td><div id="chart_div_sat2"></div></td>
        <td><div id="chart_div_sun2"></div></td>
      </tr>
      
    </table>
  </div>
    </main>
</body>
 <footer>
        <p>&copy; <?php echo date("Y"); ?> Jakob</p>
    </footer>
</html>

<!-- HTML END -->


<!-- Scripts for Making Charts -->
<?php 
include('scripts/monday_chart.php');
include('scripts/tuesday_chart.php');
include('scripts/wednesday_chart.php');
include('scripts/thursday_chart.php');
include('scripts/friday_chart.php');
include('scripts/saturday_chart.php');
include('scripts/sunday_chart.php');

include('scripts/monday_reverse_chart.php');
include('scripts/tuesday_reverse_chart.php');
include('scripts/wednesday_reverse_chart.php');
include('scripts/thursday_reverse_chart.php');
include('scripts/friday_reverse_chart.php');
include('scripts/saturday_reverse_chart.php');
include('scripts/sunday_reverse_chart.php');

?>
