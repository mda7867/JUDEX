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
        <a href="#" class="navbar-brand">Judex</a>
      </div>
      <div class="container collapse navbar-collapse" id="navbar_items">
        <ul class="nav navbar-nav navbar-left">
          <li> <a href="judge_lookup.html">Judex</a> </li>
          <li> <a href="#">County Index</a> </li>
          <li> <a href="average_sentence.html">Average Sentences</a> </li>
          <li> <a href="#">FAQ</a> </li>
          <li> <a href="#">Team</a> </li>
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

    $judge_id = $_POST["judge_id"];
    $judge_age = $_POST["judge_age"];
    $judge_gender = $_POST["judge_gender"];
    $judge_race = $_POST["judge_race"];
    $charge = $_POST["charge"];
    $region = $_POST["region"];
    $judge_name = $_POST["judge_name"];

    $sql = "SELECT judge_id, judge_name, judge_age, judge_gender, judge_race, charge, average_judge_sentence_per_charge FROM average_judge_sentences_detailed WHERE judge_name LIKE '%$judge_name%' AND judge_age LIKE '%$judge_age%' and judge_gender LIKE '%$judge_gender%' and judge_race LIKE '%$judge_race%' AND charge LIKE '%$charge%'";
    $result = $conn -> query($sql);

    if($result == TRUE){
      echo "<table class='table table-striped table-bordered'>
              <th>Judge Name</th>
              <th>Judge Age</th>
              <th>Judge Gender</th>
              <th>Judge Race</th>
              <th>Crime Type</th>
              <th>Average Sentence</th>
              ";
      while ($row = $result -> fetch_assoc()) {
        echo "<tr>";
        echo "<td hidden=true>". $row["judge_id"]. "</td>";
        echo "<td>". $row["judge_name"]. "</td>";
        echo "<td>". $row["judge_age"]. "</td>";
        echo "<td>". $row["judge_gender"]. "</td>";
        echo "<td>". $row["judge_race"]. "</td>";
        echo "<td>". $row["charge"]. "</td>";
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
