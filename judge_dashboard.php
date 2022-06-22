<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-inverse" id="navbar">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_items" aria-expanded="false" name="button">

          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>
        <a href="index.html" class="navbar-brand">Judex</a>
      </div>
      <div class="container collapse navbar-collapse" id="navbar_items">
        <ul class="nav navbar-nav navbar-left">
          <li> <a href="judge_lookup.html">Judge Lookup</a> </li>
          <li> <a href="#">County Index</a> </li>
          <li> <a href="average_sentence.html">Average Sentences</a> </li>
          <li> <a href="aboutus.html">About Us</a> </li>
          <li class="">
            <a href="#">
              <form class="search navbar-right" action="#" method="post" id="search_items">
                <input type="text" name="" placeholder="Search" id="search_bar">
                <label for="search_bar"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></label>
              </form>
            </a>
          </li>
        </ul>

      </div>

    </nav>

    <div id="php_table" >

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "Judex_tables";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$judge_id = $_GET["judge_id"];
$sql = "Select charge as x,average_judge_sentence_per_charge as y from average_judge_sentences where judge_id = $judge_id;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row 
  $dataPoints1 = array();
  while($row = $result->fetch_assoc()) {    
	array_push($dataPoints1, array("label"=> "$row[x]", "y"=> "$row[y]"));
	 }
}

	 $sql1 = "select charge as x,average_sentence as y from average_sentence_per_charge where charge in (Select charge from average_judge_sentences where judge_id = $judge_id) order by charge;";
     $result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
	 $dataPoints2 = array();
  while($row = $result1->fetch_assoc()) {    
	array_push($dataPoints2, array("label"=> "$row[x]", "y"=> "$row[y]"));
	 }
  //print_r($dataPoints1);
}
$conn->close();

?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Sentencing Chart"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Judge Sentence",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Average Sentence for Charge",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

