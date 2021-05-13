<?php
//	echo $_POST["input_firstname"];
	

// CONNECTION VARIABLES
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
//------------------------------------------------------------------
// CODE FOR CREATING AN INSERT SQL STATEMENT
	$test = "INSERT INTO myguests (firstname, lastname, email, passwords)
		VALUES ('".$_POST["input_firstname"].
		"','".$_POST["input_lastname"].
		"', '".$_POST["input_email"].
		"', '".$_POST["input_passwords"].
		"')";
	
	echo $test;
//------------------------------------------------------------------

	if ($conn->query($test) === TRUE) {
		// IF THE QUERY WAS EXECUTED SUCCESFULLY, IT WILL ECHO THIS MESSAGE
	    echo "NEW RECORD CREATED SUCCESSFULLY";
	} else {
		// ELSE, IT WILL ECHO THE ERROR MESSAGE
	    echo "Error: " . $test . "<br>" . $conn->error;
	}

	// CLOSE THE CONNECTION
	$conn->close();

	// RETURN IMMEDIATELY TO THE INDEX.PHP FILE
	header ("location:index.php");

?>