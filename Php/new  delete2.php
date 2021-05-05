<form>
delete id:<input type="">
<input type="submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'my_db');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
    $id =$_REQUEST['id'];

    // sending query
    mysql_query("DELETE FROM MyGuests WHERE id = '$id'")
    or die(mysql_error());      

    ?>