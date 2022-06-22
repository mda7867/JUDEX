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

    <div id="php_table" >


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
if (array_key_exists("judge_id", $_POST)){
    $judge_id = $_POST["judge_id"];
  }
  else{
    $judge_id = "";
  }
if (array_key_exists("judge_age", $_POST)){
    $judge_age = $_POST["judge_age"];
    
  }
  else{
    $judge_age = "";
  }
if (array_key_exists("judge_gender", $_POST)){
    $judge_gender = $_POST["judge_gender"];
    
  }
  else{
    $judge_gender = "";
  }
 
  if (array_key_exists("judge_name", $_POST)){
    $judge_name = $_POST["judge_name"];
      
  }
  else{
    
    $judge_name = "";
  }
  
  if (array_key_exists("judge_race", $_POST)){
    $judge_race = $_POST["judge_race"];
    
  }
  else{
    $judge_race = "";
  }
  if (array_key_exists("charge", $_POST)){
    $charge = $_POST["charge"];
    
  }
  else{
    $charge = "";
  }
  
    
  if (array_key_exists("region", $_POST)){
    $region = $_POST["region"];
    
  }
  else{
    $region = "";
  };
  if($judge_id == "") {
    $sql = "SELECT judge_id, judge_name, judge_age, judge_gender, judge_race, region, charge, average_judge_sentence_per_charge FROM average_judge_sentences_detailed 
    WHERE judge_name LIKE '%$judge_name%' AND judge_age LIKE '%$judge_age%' and 
    judge_gender LIKE '%$judge_gender%' and judge_race LIKE '%$judge_race%' AND region like '%$region%' AND charge LIKE '%$charge%'";
  }
  else{
    $sql = "SELECT judge_id, judge_name, judge_age, judge_gender, judge_race, region, charge, average_judge_sentence_per_charge FROM average_judge_sentences_detailed 
    WHERE judge_id = $judge_id";
  }
    $result = $conn -> query($sql);
    if($result == TRUE){
      echo "<table class='table table-striped table-bordered'>
              <th>Judge Name</th>
              <th>Judge Age</th>
              <th>Judge Gender</th>
              <th>Judge Race</th>
              <th>Crime Type</th>
              <th>Region</th>
              <th>Average Sentence</th>
              ";
      while ($row = $result -> fetch_assoc()) {
        echo "<tr>";
        echo "<td hidden=true>". $row["judge_id"]. "</td>";
        echo "<td> <a href='/JUDEX/judge_dashboard.php?judge_id=".$row["judge_id"]."'>". $row["judge_name"]. "</a></td>";
        echo "<td>". $row["judge_age"]. "</td>";
        echo "<td>". $row["judge_gender"]. "</td>";
        echo "<td>". $row["judge_race"]. "</td>";
        echo "<td>". $row["charge"]. "</td>";
        echo "<td>". $row["region"]. "</td>";        
        echo "<td>". $row["average_judge_sentence_per_charge"]. "</td>";
        echo "</tr>";
      };
      echo "</table>";
    } else{
      echo "Error getting query";
    }
    $conn -> close();
     ?>

    </div>
  </body>
</html>
