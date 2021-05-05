<form action="results.php" method="post">
<input type="text" name="nomecampo" />
<input type="submit" value="Cerca" />
</form>
<?php
 $cn = mysql_connect("localhost", "root", "");
    mysql_select_db("my_db", $cn);
$valore=mysql_escape_string($_POST['valore']);
$valore 
$risultato=mysql_query("SELECT * FROM myguests WHERE firstname LIKE '%{$valore}%' OR lastname '%{$valore}%'");
while($result=mysql_fetch_array($risultato))
    echo "<p />{$result['id']} - {$result['firstname']} - {$result['lastname']}";  
?>