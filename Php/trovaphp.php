<form>
<?php  

if(isset($_POST['invio']))  
   { 
$invio=$_POST ['invio'];
   echo "Il form ha inviato il valore ".$_POST['valore'];  
   }  
?>  
<form action="itable.php" method="post">  
<input type="text" name="valore" />  
<input type="submit" name="invio" value="Invia il form" />  
</form>
<table border="1"> 
<tr> 
<td>id</td>
<td>firstname</td>
<td>lastname</td>
<td>email</td>
</tr>
</table>
</form>
<?php
$conn = mysql_connect('localhost','root','');
mysql_select_db('my_db');
$query = mysql_query("SELECT * FROM 'myguests' WHERE firstname LIKE %'valore'%" );
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



