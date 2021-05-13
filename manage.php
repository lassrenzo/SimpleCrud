<?php
	// REQUEST ID
	//echo $_REQUEST["id"];

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
// SQL STATEMENT
	$sql = "SELECT id, firstname, lastname, email, passwords FROM myguests
		WHERE id = ".$_REQUEST['id']."";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // Set the recordset as values for the following variables
	    while($row = $result->fetch_assoc()) {
	        $firstname = $row["firstname"];
	        $lastname = $row["lastname"];
	        $email = $row["email"];  
			$passwords = $row["passwords"];  
	    }
	} 
	else {
	    echo "0 results";
	}

// EDIT USER INTERFACE
?>
<form action="update.php?id=<?php echo $_REQUEST['id']; ?>" method="post">
	<table border=1>
		<tr>
			<td colspan=2 align=center>EDIT RECORD</td>
		</tr>
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="edit_firstname" value="<?php echo $firstname; ?>" autofocus></td>
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="edit_lastname" value="<?php echo $lastname; ?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="edit_email" value="<?php echo $email; ?>"></td>
		</tr>
		
		<tr>
			<td>passwords:</td>
			<td><input type="text" name="edit_passwords" value="<?php echo $passwords; ?>"></td>
		</tr>
		
		
		<tr>
			<td align=center><a href="index.php">Cancel</a></td>
			<td align=center><input type="submit" value="UPDATE"></td>
		</tr>
	</table>
</form>
<?php

?>