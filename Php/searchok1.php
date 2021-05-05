<?php
mysql_connect("localhost","root","")or die ("could not connect");
mysql_select_db("my_db")or die("could not find db!");
$output='';
//collect
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	$query = mysql_query("SELECT * FROM 'myguests' WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'")or die("could not search!");
	$count = mysql_num_rows($query);
	if($count == 0){
		$output='there was no search results!';
	}else{
		while($row = mysql_fetch_array($query)){
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$id = $row['id'];
			
			$output .= '<div>'.$firstname.' '.$lastname.'</div>';
	}
}
}
?>
<html>
<head>
<title>RICERCA DATI</title>
</head>
<body>
<form action="search.php" method="post">
<input type="text" name="search" placeholder="search for members"/>
<input type="submit" value=">>"/>
</form>
<?php print("$output");?>
</body>
</html>