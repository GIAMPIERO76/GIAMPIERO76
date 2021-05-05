<form action="Delete.php" method="POST">
ID TO DELETE:&nbsp;<input type="text" name="id" required><br><br>
<input type="submit" name="delete" value="clear data">

<?php
if(isset($_POST['submit'])){
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname= 'mydb';

$id = $_POST['id'];
$connect = mysqli_connect('localhost','root','','mydb');

$query="DELETE FROM MyGuests WHERE id=$id";
$result = mysqli_query($connect, $query);
if(result)
{
echo 'data deleted';
}else{
echo 'data not delete';
}
mysqli_close($connect);
?>