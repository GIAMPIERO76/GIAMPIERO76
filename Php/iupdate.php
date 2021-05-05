<form>
<table>
<tr>
<td>

</td>
</tr>
</table>
</form>
<?PHP 
//Connessione 
mysql_connect('localhost', 'root', '','my_db' ) ;
or die('Connessione non riuscita: ' . mysql_error()); 
if(!mysql_select_db('my_db')) 
die('Selezione database fallita!'); 
function elenca() { 


$e="SELECT * FROM MyGuests"; 
$e2=mysql_query($e) or die (mysql_error()); 
while($row = mysql_fetch_array($e2)) 
{  
echo "<form name='' action='' method=POST>"; 
echo $row['Id']; 
echo "<input type='hidden' name='id' value='"; 
echo $row ['id']; 
echo "'/> - Nickname: "; 
echo $row['Nick']; 
echo " - Nome: "; 
echo $row['Nome']; 
echo " - Cognome: "; 
echo $row['Cognome'];  

echo " - Data di nascita: "; 
echo $row['DataNascita']; 
echo " - Luogo di nascita: "; 
echo $row['LuogoNascita']; 
echo " - E-mail: "; 
echo "  <input type='text' name='mail' value='"; 
echo $row['Email']; 
echo"'/><input type='submit' name='mod'  

value='Modifica'></form><br/>"; 
} 
} 
IF (isset($_POST['submit'])){ 
$id=$_POST['id']; 
$mail=$_POST['mail'];  
$sql="UPDATE users SET Email = '$mail' WHERE Id = ".id.""; 
mysql_query($sql) or die("Errore:".mysql_error()); 
} 

?> 
