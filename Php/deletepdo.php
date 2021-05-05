<html>        
<head>
        <title>Delete a Record from MySQL Database</title>
    </head>
<body>
<?php   
if(isset($_POST['delete'])) {      
    try {
        $db = new PDO(
        'mysql:host=127.0.0.1;dbname=mydb;port=3306;charset=utf8',
        'root',
        ''
        );
    } catch (PDOException $e) {
        echo "Connessione al database fallita";
        exit;
    }
    
    // Se gli id sono lunghi FILTER_SANITIZE_NUMBER_INT potrebbe non andare bene
    $delete_id = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT); 
    
    try {
        $query = $db->prepare("DELETE FROM MyGuests WHERE id = :id");    
        $query->bindParam(':id', $delete_id, PDO::PARAM_INT);
        $result = $query->execute();
        if(!$result){
            echo 'Errore durante l\'eliminazione';
        } else {
            echo 'Elemento correttamente eliminato';
        }
    } catch (PDOException $e){
        echo $e->getMessage();
        exit;
    }
} else {
?>
<h1>Elimina Dati</h1>
<form method="post" action="<?php $_PHP_SELF ?>" >
  ID: <input type="text" name="delete">
   <input type="submit" value="Elimina">
   <p><a href="database.html">Menu</a></p>
</form>
<?php } ?>
</body>
</html>