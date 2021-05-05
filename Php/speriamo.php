<form method="post" action="cerca.php">
<input type="mat" name="testo">
<input type="submit" value="Cerca">
</form>
<?php
 
$host = 'localhost';
$user = 'root';
$password = '';
 
 
mysql_connect($host,$user,$password);
//N.B.
//Istruzione SQL per ricercare uno specifico record; il confronto viene fatto tra il valore ‘$mat’ inserito nella maschera di ricerca fatta in html ed il valore del campo “matricola” della tabella nel database mysql;
   

mysql_select_db("my_db");
  if(isset($_POST['mat'])){
	  $mat =$_POST['mat'];
  }
 

print ("Ricerca del record richiesto: <br>");
 
$dati = mysql_query ("select * from myguests WHERE  firstname LIKE  '%$mat%' ");
 
while ( $array = mysql_fetch_array($dati))
{
 
print ("<table border=1><tr> <td> $array[firstname] </td> <td> $array[lastname] </td> <td> $array[email] </td> </tr></table>");
  

}
 
//N.B.
//Verrà visualizzato soltanto il RECORD con matricola = alla matricola inserita nella maschera di ricerca;
 
?>