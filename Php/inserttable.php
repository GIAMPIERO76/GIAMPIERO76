<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'mydb';
   $conn=mysql_connect('localhost','root','','mydb');
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = "INSERT INTO dati 
      (Nome,Cognome,email);
      VALUES ('giampiero','pagliara','ilmiogiornalaio@gmail.it' )";
      
   mysql_select_db('mydb');
   $query = mysql_query( $sql, $conn );
   
   if(! $query ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);
?>