<form>
<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
<input type="submit" name="search" value="Filter"><br><br>
</form>
<?php 
2	  if(isset($_POST['submit'])){ 
3	  if(isset($_GET['go'])){ 
4	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
5	  $name=$_POST['name']; 
6	  //connect  to the database 
7	  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error()); 
8	  //-select  the database to use 
9	  $mydb=mysql_select_db("my_db"); 
10	  //-query  the database table 
11	  $sql="SELECT  id, firstname, lastname FROM MyGuests WHERE firstname LIKE '%" . $fname .  "%' OR lastname LIKE '%" . $lname ."%'"; 
12	  //-run  the query against the mysql query function 
13	  $result=mysql_query($sql); 
14	  //-create  while loop and loop through result set 
15	  while($row=mysql_fetch_array($result)){ 
16	          $FirstName  =$row['firstname']; 
17	          $LastName=$row['lastname']; 
18	          $ID=$row['id']; 
			$email=$row['email'];
19	  //-display the result of the array 
20	  echo "<ul>\n"; 
21	  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n"; 
22	  echo "</ul>"; 
23	  } 
24	  } 
25	  else{ 
26	  echo  "<p>Please enter a search query</p>"; 
27	  } 
28	  } 
29	  } 
30	?> 