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
$conn = mysql_connect('localhost','root','','my_db');
mysql_select_db( 'my_db' );//biblioteca
$sql = "SELECT * FROM dati";//visualizza libri
//mysql_select_db( 'my_db' );
$query = mysql_query($sql);

while($row = mysql_fetch_array($query));
{
	//qui sotto inserite i campi php table libri
echo "<tr>";
echo "<td>".$row['Nome']."</td>";
echo "<td>".$row['Cognome']."</td>";
echo "<a href="new delete.php?id=<? echo $rows['id'];?>">delete</a>
echo "</tr>";
}
echo "</table>";
mysql_close($conn);
?>