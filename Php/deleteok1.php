<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>
<?php
         if(isset($_POST['delete'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
			$dbname ='my_db';
            $conn = mysql_connect('localhost', 'root', '', 'my_db');
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
				
            $id = $_POST['id'];
            
            $sql = "DELETE FROM MyGuests WHERE id ='$id'" ;
            mysql_select_db('my_db');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
			<form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">ID</td>
                        <td><input name = "emp_id" type = "text" 
                           id = "emp_id"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>