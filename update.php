<?php
// CONNECTION VARIABLES
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//-------------------------------------------------------------

	$sql = "UPDATE myguests 
			SET lastname='".$_REQUEST['edit_lastname']."',
				firstname='".$_REQUEST['edit_firstname']."',
				passwords='".$_REQUEST['edit_passwords']."',
				email='".$_REQUEST['edit_email']."' 
			
			WHERE id=".$_REQUEST['id']."";
	


	if ($conn->query($sql) === TRUE) {
	    header ("location:index.php");
	} else {
	    echo "Error updating record: " . $conn->error;
	}

$conn->close();

?>