<form action="isearch.php" method="post">
<table border="1" align="center">
        <tr>
				<td align="center">id</td>
                <td align="center">cognome</td> 
                <td align="center">nome</td>
				<td align="center">email</td>
		</tr>
		<p><a href="database.html">Menu</a></p>
		
<?php
$conn = mysql_connect('localhost','root','','my_db');
mysql_select_db('my_db');
$query = mysql_query("SELECT * FROM MyGuests WHERE Description LIKE '%nome%'") or die (mysql_error());
while($row = mysql_fetch_array($query)){
    echo " 
         <tr>
				<td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['lastname']."</td> 
              <td>".$row['email']."</td> 
          </tr>";
         }
		 echo "</table>";
		 mysql_close($conn);
		 
?>
</table>
