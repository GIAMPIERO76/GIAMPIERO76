<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$sql = 'CREATE DATABASE mydb';
if (mysql_query($sql, $link)) {
    echo "Database mydb created successfully\n";
} else {
    echo 'Error creating database: ' . mysql_error() . "\n";
}
?>