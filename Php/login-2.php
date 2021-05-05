<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>La Biblioteca</title>
</head>
<body>

<?php

include "config.php";

// ottengo i dati del form usando isset $_POST
if(isset($_POST['username'])){
	$username = $_POST['username'];
}//else{
	//echo"missing username";
if(isset($_POST['password'])){
	$password = $_POST['password'];
}
if(isset($_POST['username'])&& isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
//echo"hello".$username;
}//else{
	//echo "missing something";
}
//$username = $_POST['username']; li ho esclusi per non confondermi
//$password = $_POST['password'];
//controllo l'esistenza della coppia
$query = "SELECT * FROM utenti WHERE username = '$username' and password = '$password'"; //seleziona tutti i campi della tabella utenti, dove username è uguale alla nostra username
$risultati = mysql_query($query);
$numero = mysql_num_rows($risultati); //numero righe che sono state estratte con succesos dal databe

//notifico il login/il login fallito
if ($numero > 0){
  echo "Login effettuato con successo <br> Vai alla <a href='index.php'> Home </a></div>";
} else {
  echo "Login non effettuatto, i dati non corrispondono <br> Torna al <a href='login.php'> Login </a> </div>";
}

?>
<html>
<--! CREO IL FORM HTML-->
<form method="POST">
  <label for="username"> Username: </label>
  <input type="text" id="username" name="username" required>

  <label for="pwd"> Password: </label>
  <input type="password" id="pwd" name="password" required>
  
  <button type="submit" class="btn btn-default"> Login </button>
</form>


<?php



?>

</body>

</html>
