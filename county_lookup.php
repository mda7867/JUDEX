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



  $sql = "Select charge as x,average_sentence_region as y from average_sentence_per_region where charge in (";

  if (array_key_exists("charge", $_POST)){
    foreach ($_POST["charge"] as $crime) {
      $sql .="'". $crime ."'".  ',';
    };
  };

  rtrim($sql, ',');
  $sql .= ");";
 echo "$sql";





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

  </body>
</html>
