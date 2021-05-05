<form action="iidelete.php" method="POST">
ID TO DELETE:&nbsp;<input type="text" name="id" required><br><br>
<input type="submit" name="delete" value="clear data">
</form>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'mydb');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=3";
//if (isset($_POST['submit'])) {
   //$sql = "DELETE FROM table WHERE id=";
   // mysql_query($sql);
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
