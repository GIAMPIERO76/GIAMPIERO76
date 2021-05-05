<?php//recupero i valori via post dal precendete form di ricerca
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$residenza = $_POST['residenza'];

//inizio il loop
require_once("connessione_db.php");  //connessione db

mysql_select_db("$my_db",$connessione); 

//query
$risultato = mysql_query("SELECT * FROM myguests WHERE MATCH ( nome, cognome, residenza) AGAINST ('$nome, $cognome, $residenza')");

//in caso di errore
			if (!$risultato) {

					exit ('<p> Errore mentre recuperavo i dati' . mysql_error() . '</p>');
			}

while ($row = mysql_fetch_array($risultato))   

		{

//stampo risultati a video come siete abituati
?>