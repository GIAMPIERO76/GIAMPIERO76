<--! questo e il codice di base dovete solo inserire html, la connection postgresql e i comando sql per postgresql-->
<table border="1">
<tr>
<th>nome</th>
<th>cognome</th>
<tr>
<?php
$dbhost='localhost';
$dbuser='root';//postgresql
$dbpass='';//postgresql
$dbname='mydb';//biblioteca 
$conn = mysql_connect('localhost','root','','mydb');
mysql_select_db( 'mydb' );//biblioteca
$sql = "SELECT * FROM myguests";
//mysql_select_db( 'mydb' );
$query = mysql_query($sql);

while($row = mysql_fetch_array($query));
{
	//qui sotto inserite i campi php table
echo "<tr>";
echo "<td>".$row['Nome']."</td>";
echo "<td>".$row['Cognome']."</td>";
echo "<a href="new delete.php?id=<? echo $rows['id'];?>">delete</a>
echo "</tr>";
}
echo "</table>";
mysql_close($conn);
?>