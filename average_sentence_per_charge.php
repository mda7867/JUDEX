
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Average Sentences</title>
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

<h2>Average Sentence</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Judex_tables";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  echo "Connection failed";
  die("Connection failed: " . $conn->connect_error);
}

$charges = $_POST["charge"];


$sql = "SELECT charge, average_sentence FROM average_sentence_per_charge WHERE charge = '$charges'"; // IDEA: WHERE region = something (we need to be able to group by regions) ;
$result = $conn->query($sql);

if ($result == TRUE){
  while($row = $result->fetch_assoc()){
            $average_sentence = $row["average_sentence"];
        //demonstrates outputting a column from a select as html row by row
        echo '<p>The average sentence of this crime is '.$average_sentence."</p>";
        }     ;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<br><br>
<a href="index.html">Back to home</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
