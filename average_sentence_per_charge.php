
<!DOCTYPE html>
<html>
<body>

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
