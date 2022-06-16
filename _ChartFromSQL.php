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

$sql = "Select charge as x,average_judge_sentence_per_charge as y from average_judge_sentences where judge_id = 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row 
  $dataPoints = array();
  while($row = $result->fetch_assoc()) {    
	array_push($dataPoints, array("label"=> "$row[x]", "y"=> "$row[y]"));
	 }
  print_r($dataPoints);
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
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

