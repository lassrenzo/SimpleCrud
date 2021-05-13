<?php
// THESE ARE THE CONNECTION VARIABLES TO CONNECT TO OUR DBMS
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection variable
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    // If the connection variable encounters an error
    die("Connection failed: " . $conn->connect_error);
}


?>

<?php
    //you can insert your code here.
    // you can add comments in PHP using the double-slash.
?>

<?php
    $sql = "SELECT id, firstname, lastname, email, passwords FROM myguests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // START DRAWING THE TABLE
        
        ?>
        <form action = "insert.php" method="post">
            <table border=1>
                <tr>
                    <td colspan=2 align=center>ADD NEW RECORD</td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="input_firstname" ></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="input_lastname" ></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="input_email"></td>
                </tr>
                <tr>
                    <td>passwords:</td>
                    <td><input type="text" name="input_passwords"></td>
                </tr>
                
                <tr>

                    <td colspan=2 align=center><input type="submit" value="Insert"></td>
                </tr>
            </table>
        </form>
        <br>
        <?php
        
        echo "<table border=1>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>passwords</th>
                        <th>Manage</th>
                    </tr>";
    
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. 
                "</td><td>" . $row["firstname"]. 
                "</td><td>" . $row["lastname"]. 
                "</td><td>" .$row["email"].
                "</td><td>" .$row["passwords"].
                "</td><td><a href = 'manage.php?id=".$row["id"]. "'>edit</a>
                </td><td><a href = 'delete.php?id=".$row["id"]. "'>delete</a>
                </td></tr>";
            
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    
    $conn->close();
?>