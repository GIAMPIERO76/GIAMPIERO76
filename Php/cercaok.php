<form method="post" action="cerca.php">
    <input type="text" name="testo" placeholder="Es. bilocale sul mare" /><br  />
    <input type="submit" value="CERCA"  />
    </form>
	<h2 class="intestazione">Risultati della tua ricerca</h2>
<?php include('gestione/config.php'); ?>
<?php
//require_once("gestione/connessione_db.php");  //connessione db
mysql_select_db("$my_db",$connessione); //seleziono il database e connetto

//recupero quello che hanno scritto
$testo = $_POST['firstname'];
$prezzo = $_POST['lastname'];

//query mysql
$sql_cerca = mysql_query("SELECT * FROM myguests  WHERE (firstname LIKE '%" . $testo . "%') OR (lastname LIKE '%" . $testo . "%') OR (id LIKE '%" . $prezzo . "%')");

//trovati
$trovati = mysql_num_rows($sql_cerca);

//se ci sono risultati
if($trovati > 0)
{

 echo "<p class='desc' style='margin-left:25px;'>Trovate $trovati voci per il termine <b>".stripslashes($testo)."</b></p>\n";

//inizio il loop
while($row = mysql_fetch_array($sql_cerca)) {

echo '<p>' . $row['titolo'] . '</p>';

  } //fine LOOP valori trovati

  } //fine risultati if

  else{ //se non ci sono risultati

  // notifica in caso di mancanza di risultati
  echo "Al momento non sono stati pubblicati post/articoli che contengano i termini cercati.";

  }//fine else 

?>