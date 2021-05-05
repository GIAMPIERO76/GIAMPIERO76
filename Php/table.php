<!--<table border="1">
<!--<tr>
</td>
<form action="iinsert.php" method="post">
firstname:<input type="text" name="firstname"><br/>
lastname:<input type="text" name="lastname"><br/>
email:<input type="text" name="email"><br/>
<input type="submit" name="submit">
</form>
</td>
</tr>
</table>-->

<table border="1" align="center"> 
        <tr>
				<td align="center">id</td>
                <td align="center">cognome</td> 
                <td align="center">nome</td>
				<td align="center">email</td>
		</tr>
		<p><a href="database.html">Menu</a></p>
		
<?php
$conn = mysql_connect('localhost','root','','mydb');
mysql_select_db('mydb');
$query = mysql_query("SELECT * FROM MyGuests");
while($row = mysql_fetch_array($query)){
    echo " <table>
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
