<?php
$DB_host     = 'localhost';
$DB_user     = 'root';
$DB_password = 'secret';
$DB_name     = 'test';

$link = mysql_connect($DB_host, $DB_user, $DB_password);
if (!$link) {
	die ('Non riesco a connettermi: ' . mysql_error());
}

$db_selected = mysql_select_db($DB_name, $link);
if (!$db_selected) {
	die ("Errore nella selezione del database: " . mysql_error());
}

if($_POST) {
	effettua_login();
} else {
	mostra_form();
}

function mostra_form()
{
	// mostro un eventuale messaggio
	if(isset($_GET['msg'])) {
		echo '<b>'.htmlentities($_GET['msg']).'</b><br /><br />';
	}
	?>
	<form name="form_login" method="post" action="">
		<label>nome: <input name="nome" type="text" value="" /></label><br />
		<label>password: <input name="password" type="password" value="" /></label><br />
	    <input name="invia" type="submit" value="Invia" />
	</form>
	<?
}

function effettua_login()
{
	// recupero il nome e la password inseriti dall'utente
	$nome      = trim($_POST['nome']);
	$password  = trim($_POST['password']);
	// verifico se devo eliminare gli slash inseriti automaticamente da PHP
	if(get_magic_quotes_gpc()) {
		$nome      = stripslashes($nome);
		$password  = stripslashes($password);
	}

	// verifico la presenza dei campi obbligatori
	if(!$nome || !$password) {
		$messaggio = urlencode("Non hai inserito il nome o la password");
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
		exit;
	}
	// effettuo l'escape dei caratteri speciali per inserirli all'interno della query
	$nome     = mysql_real_escape_string($nome);
	$password = mysql_real_escape_string($password);	

	// preparo ed invio la query
	$query = "SELECT id FROM utenti WHERE nome = '$nome' AND pswd = MD5('$password')";
	$result = mysql_query($query);
	// controllo l'esito
	if (!$result) {
		die("Errore nella query $query: " . mysql_error());
	}

	$record = mysql_fetch_array($result);

	if(!$record) {
		$messaggio = urlencode('Nome utente o password errati');
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
	} else {
		session_start();
		$_SESSION['user_id'] = $record['id'];
		$messaggio = urlencode('Login avvenuto con successo');
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
	}
}
?>