<form action="delete_ok.php" method="POST">
ID TO DELETE:&nbsp;<input type="text" name="id" required><br><br>
<input type="submit" name="delete" value="clear data">
</form>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";

if(isset($_POST['submit'])){
// Create connection
$conn = new mysqli('localhost', 'root', '', 'mydb');
if(! $conn ) { die('Could not connect: ' . mysql_error()); }                            
            $id = $_POST['id'];                        
            $sql = "DELETE FROM 'myguests' WHERE 'id' ='$id'" ;            
            mysql_select_db('mydb');            
            $retval = mysql_query( $sql, $conn );                        
            if(! $retval ) { die('Could not delete data: ' . mysql_error()); } 
            echo "Deleted data successfully\n"; 
            mysql_close($conn); }else {
        ?>
        <form method = "post" action="<?php $_PHP_SELF ?>">
            <table width = "400" border = "0" cellspacing = "1" cellpadding = "2">
                <tr>
                    <td width = "100">ID</td>
                    <td>
                        <input name = "emp_id" type = "text" id = "emp_id">
                        </td>
                    </tr>
                    <tr>
                        <td width = "100"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width = "100"></td>
                        <td>
                            <input name = "delete" type = "submit" id = "delete" value = "Delete">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php } ?>
            </body>
        </html>