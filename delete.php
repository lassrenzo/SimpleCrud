<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// REQUEST ID
// echo $_REQUEST["id"];


// sql to delete a record
$sql = "DELETE FROM myguests WHERE id=".$_REQUEST['id']."";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully <br>";
  echo "<a href='index.php'>Go back to Home</a>";
} else {
  echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>