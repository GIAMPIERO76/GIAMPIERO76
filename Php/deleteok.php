<form action="iidelete.php" method="POST">
ID TO DELETE:&nbsp;<input type="text" name="id" required><br><br>
<input type="submit" name="delete" value="clear data">
</form>
<?
if(isset($_POST['submit']))
{
$host='localhost';
$user='root';
$pass='';
$dbname='my_db';
$id=$_POST['id'];
$conn=mysqli_connect('localhost','root','','my_db');
$query="DELETE FROM 'MyGuests' WHERE 'id' = $id";
$result=mysqli_query($conn, $query);
//if($result=='$id')
//($_POST['id'])
//($result=="id")
//{
//echo 'Data deleted';
//}else{
//echo 'Data not deleted';
}

//}
mysqli_close($conn);
?>