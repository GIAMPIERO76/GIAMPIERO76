<!DOCTYPE HTML>  

<html>

<head>

</head>

<body>  

<?php

// define variables and set to empty values
$username = $password = $nome = $cognome = $email =  $sesso = $datan = $luogon = $indirizzo = $telefono = $tipo = $NumMaxPrestiti = "";

//qui va inserito if(isset($_POST["username"])); //x tutti i campi
//$username=$_POST["username"];

if (isset($_SERVER["REQUEST_METHOD"] == "POST")) {//per tutti i campi
  $username = test_input($_POST["username"]);
  if (isset($_SERVER["REQUEST_METHOD"] == "POST"))
  $password = test_input($_POST["password"]);
  
  $nome = test_input($_POST["nome"]);
  $cognome = test_input($_POST["cognome"]);
  $email = test_input($_POST["email"]);
  $sesso = test_input($_POST["sesso"]);
  $datan = test_input($_POST["datan"]);
  $luogon = test_input($_POST["luogon"]);
  $indirizzo = test_input($_POST["indirizzo"]);
  $telefono = test_input($_POST["telefono"]);
  $tipo = test_input($_POST["tipo"]);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registrazione</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" required>
  <br><br>
  Password: <input type="text" name="password" required>
  <br><br>
  Nome: <input type="text" name="nome" required>
  <br><br>
  Cognome: <input type="text" name="cognome" required>
  <br><br>
  E-mail: <input type="text" name="email" required>
  <br><br>
  Sesso:
  <input type="radio" name="sesso" value="f">F
  <input type="radio" name="sesso" value="m">M
  <br><br>
  Data nascita: <input type="date" name="datan" max="2017-07-11" required>
  <br><br>
  Luogo nascita: <input type="text" name="luogon" required>
  <br><br>
  Indirizzo: <textarea name="indirizzo" rows="5" cols="40" required></textarea>
  <br><br>
  Telefono: <input type="text" name="telefono" required>
  <br><br>
  Tipo:
  <select>
  <option value="Utente" name="tipo">Studente</option>
  <option value="Dipendente" name="tipo">Docente</option>
  <option value="Altro" name="tipo">Altro</option>
</select>
  <br><br>
  
  <input type="submit" name="sumbit" value="Registrati" >  
</form>
<!--qui ci va inserito il php -->(1)

<?php
//questo codice php va inserito tra html e php table vedi 1
//PAGINA DI REGISTRAZIONE

// Connessione al database
$dbconn = pg_connect("host=localhost dbname=Biblioteca user=postgres password=postgres")
    or die('Connessione non riuscita: ' . pg_last_error()); //se non riesce a connettersi, mostra l'errore


//inserting data order
$toinsert = "INSERT INTO Utente (username, password, nome, cognome, email , sesso, datan, Luogon, indirizzo, numtelefono) VALUES ('$_POST['$username']','$_POST['$password']','$_POST['$nome']','$_POST['$cognome']' "' . $cognome . '", "' . $email . '", "' . $datan . '", "' . $luogon . '", "' . $indirizzo . '", "' . $telefono . '")";

if($tipo == "Studente") {
  $NumMaxPrestiti==5;
  echo "Numero max prestiti: " .$NumMaxPrestiti;
}

if($tipo == "Docente") {
  $NumMaxPrestiti==10;
}

if($tipo == "Altro") {
  $NumMaxPrestiti==3;
}


//declare in the order variable
pg_query($toinsert) or die('Query failed: ' . pg_last_error());
if($toinsert){
  echo("<br>Inserimento avvenuto correttamente");
} else{
  echo("<br>Inserimento non eseguito");
}


// Performing SQL query
$query = 'SELECT * FROM "Utente"';
$resultquery = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($resultquery, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($resultquery);



// Closing connection
pg_close($dbconn);
?>
<!--<?php
echo "<h2>Quello che hai inserito:</h2>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $nome;
echo "<br>";
echo $cognome;
echo "<br>";
echo $email;
echo "<br>";
echo $sesso;
echo "<br>";
echo $datan;
echo "<br>";
echo $luogon;
echo "<br>";
echo $indirizzo;
echo "<br>";
echo $telefono;
echo "<br>";
echo $tipo;
echo "<br>";
?>-->





<?php
//questo codice php va inserito tra html e php table vedi 1
//PAGINA DI REGISTRAZIONE

// Connessione al database
$dbconn = pg_connect("host=localhost dbname=Biblioteca user=postgres password=postgres")
    or die('Connessione non riuscita: ' . pg_last_error()); //se non riesce a connettersi, mostra l'errore


//inserting data order
$toinsert = "INSERT INTO Utente (Username, Password, Nome, Cognome, Email , Sesso, DataN, LuogoN, Indirizzo, NumTelefono) VALUES ("' . $username . '", "' . $password . '", "' . $nome . '", "' . $cognome . '", "' . $email . '", "' . $datan . '", "' . $luogon . '", "' . $indirizzo . '", "' . $telefono . '")";

if($tipo == "Studente") {
  $NumMaxPrestiti==5;
  echo "Numero max prestiti: " .$NumMaxPrestiti;
}

if($tipo == "Docente") {
  $NumMaxPrestiti==10;
}

if($tipo == "Altro") {
  $NumMaxPrestiti==3;
}


//declare in the order variable
pg_query($toinsert) or die('Query failed: ' . pg_last_error());
if($result){
  echo("<br>Inserimento avvenuto correttamente");
} else{
  echo("<br>Inserimento non eseguito");
}


// Performing SQL query
$query = 'SELECT * FROM "Utente"';
$resultquery = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($resultquery, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($resultquery);



// Closing connection
pg_close($dbconn);
?>

</body>
</html>
