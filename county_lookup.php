<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>County Lookup</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
          <li> <a href="county_lookup.html">County Lookup</a> </li>
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

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Judex_tables";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error) {
      echo "Connection failed";
      die("Connection failed: " . $conn->connect_error);
    }

    if (array_key_exists("first_region", $_POST)){
        $first_region = $_POST["first_region"];

      }
      else{
        echo "Region does not exist";
      }

      if (array_key_exists("second_region", $_POST)){
          $second_region = $_POST["second_region"];

        }
        else{
          $second_region = "";
        }

        if (array_key_exists("charge", $_POST)){
          $charge = $_POST["charge"];

        }
        else{
          $charge = "";
        }

$sql = "Select charge as x,average_sentence_for_region_1 as y from comparison_view where charge in(";
if (strlen($second_region)>0) {
  if (array_key_exists("charge", $_POST)){
    foreach ($_POST["charge"] as $crime){
      $sql .="'". $crime ."'".  ',';
    };
    $sql = rtrim($sql, ',');
  $sql .= ") and region_1 = '$first_region' and region_2 = '$second_region'";
  }
  else{
    $sql = "Select charge as x,average_sentence_for_region_1 as y from comparison_view where region_1 = '$first_region' and region_2 = '$second_region'";
  };
}
else{
  if (array_key_exists("charge", $_POST)){
    foreach ($_POST["charge"] as $crime){
      $sql .="'". $crime ."'".  ',';
    };
    $sql = rtrim($sql, ',');
  $sql .= ") and region_1 = '$first_region' group by charge";
}
  else{
    $sql = "Select charge as x,average_sentence_for_region_1 as y from comparison_view where region_1 = '$first_region' group by charge";
  };
};

 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
   // output data of each row
   $dataPoints1 = array();
   while($row = $result->fetch_assoc()) {
 	array_push($dataPoints1, array("label"=> "$row[x]", "y"=> "$row[y]"));
 	 }
 }


 $sql1 = " Select charge as x,average_sentence_for_region_2 as y from comparison_view where charge in(";

  if (array_key_exists("charge", $_POST)){
    foreach ($_POST["charge"] as $crime) {
      $sql1 .="'". $crime ."'".  ',';
    };
    $sql1 = rtrim($sql1, ',');
    $sql1 .= ") and region_1 = '$first_region' and region_2 = '$second_region'";
  }

  else{
   $sql1 = "Select charge as x,average_sentence_for_region_2 as y from comparison_view where region_1 = '$first_region' and region_2 = '$second_region'";
 };



 $result = $conn->query($sql1);

 if ($result->num_rows > 0) {
   // output data of each row
   $dataPoints2 = array();
   while($row = $result->fetch_assoc()) {
  array_push($dataPoints2, array("label"=> "$row[x]", "y"=> "$row[y]"));
   }
 }

 $conn->close();
     ?>



<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Region Sentence Comparison"
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
		name:  "<?php print $first_region; ?>",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "<?php print $second_region; ?>",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
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
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
