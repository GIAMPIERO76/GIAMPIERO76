<body>
<form action="isearch.php" method="post">
<table border="1">
<tr>
<td>id</td><td>cognome</td><td>nome</td><td>email</td>
</tr>
</table>
</form>
</body>
<?php
 $con = mysql_connect ('localhost', 'root', '');
 mysql_select_db ('my_db',!$con);
  if (!$conn)
    { 
    die ("Could not connect: " . mysql_error());
    } 
    $sql = mysql_query("SELECT * FROM MyGuests WHERE Description LIKE '%nome%'") or die
        (mysql_error());

       while ($row = mysql_fetch_array($sql)){
 
	echo '<br /> id:'.$row['id'];
	echo '<br /> cognome:'.$row['cognome'];
	echo '<br /> nome:'.$row['nome'];
	echo '<br /> email:'.$row['email'];
  }

  mysql_close($conn);
   ?>