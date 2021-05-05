<h1 align="center">INSERIMENTO DATI</h1>
<form action="iinsert.php" method="post"> 
<fieldset>
<table align="center">
<tr>

<legend align="center">Inserimento Dati</legend>
<td align="center">firstname:<input type="text" name="firstname"><br/></td>
</tr>
<tr>
<td align="center">lastname:<input type="text" name="lastname"><br/></td>
</tr>
<tr>
<td align="center">email:<input type="text" name="email"><br/></td>
</tr>
<tr>
<td align="center"><input type="submit" name="submit"></td>
</tr>
<tr>
<td align="center"><p><a href="database.html">Menu</a></p><td>
</tr>
</fieldset>
</table>
</form>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "my_db";

if(isset($_POST['submit'])){
// Create connection
$conn = new mysqli('localhost', 'root', '', 'my_db');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "INSERT INTO MyGuests (id, firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
$sql = "INSERT INTO myguests ( firstname, lastname, email)
VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[email]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>