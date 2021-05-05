<--! questo e il codice di base dovete solo inserire html, la connection postgresql e i comando sql per postgresql-->
<table border="1">
<tr>
<th>id</th>
<th>firstname</th>
<th>lastname</th>
<th>email</th>
<tr>
<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='my_db';
$conn = mysql_connect('localhost','root','');
mysql_select_db( 'my_db' );//biblioteca
$sql = "select * from myguests";
//mysql_select_db( 'biblioteca' );
$query = mysql_query($sql);

while($row = mysql_fetch_array($query));
{
	//qui sotto inserite i campi php table
echo "<tr>";
echo"<td>".$row['id']."</td>";
echo"<td>".$row['firstname']."</td>";
echo"<td>".$row['lastname']."</td>";
echo"<td>".$row['email']."</td>";

echo "<a href="new delete.php?id=<? echo $rows['id'];?>">delete</a>
echo "</tr>";
}
echo "</table>";
mysql_close($conn);
?>