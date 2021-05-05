<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'my_db';
$conn = mysql_connect('localhost', 'root', '','my_db');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br />';

$sql = "CREATE TABLE dati(
Nome char(20),
Cognome char(20)
)";

mysql_select_db( 'my_db' );
$query = mysql_query( $sql, $conn );
if(! $query )
{
  die('Could not create table: ' . mysql_error());
}
echo "Table created successfully\n";
mysql_close($conn);
?>