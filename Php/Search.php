<form action="Search.php" method="post" >

<input type="text" name="valueToSearch" placeholder="Search Record.."></br>
<input type="submit" name="search" value="Search Record..">
</form>
<?php
mysqli_connect("localhost","root","");
//include 'db-connect.php';

mysqli_select_db("my_db");

$valueToSearch = $_POST['valueToSearch'];

$sql = "SELECT * FROM myguests WHERE firstname LIKE="%$valueToSearch%";
$result = mysqli_query($sql, $connection);

?>

<?php

if ($result)
 {
  while($row = mysqli_fetch_array($result))
 {

?>
<table>
<tr><th>ID</th><th>FIRSTNAME</th><th>LASTNAME</th></tr>
<tr>
<td><?php echo $row["firstnamename"]; ?></td>
<td><?php echo $row["lastname"]; ?></td>
</tr>

<?php
 }
} 
?>
</table>