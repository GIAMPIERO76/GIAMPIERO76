<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db";

// Create connection
$conn = new mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM MyGuests WHERE firstname LIKE '%".firstname."%'"; ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo <table><tr><td>ID</td><td>firstname</td><td>lastname</td><td>email</td></tr></table>";

    // output data of each row
    while($row = $result->mysql_fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]." " .$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>
