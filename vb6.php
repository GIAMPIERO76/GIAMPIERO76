<?php
$yourip=$_SERVER['REMOTE_ADDR'];

echo "you ip address is $yourip";
?>
<?php
ini_set('display_errors',0);

if(empty($_POST['ip']))

{
	echo "";
	
}
elseif (empty($_POST['port']))<!--{echo"";}-->
	

else{
	
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	
	$checkport = fsockopen($ip, $port, $errnum, $errstr, 2);
	
	if(!$checkport)
	{
		echo "<br>IP Address Scanned: <b>".$ip."</b><br><br>";
}
?>