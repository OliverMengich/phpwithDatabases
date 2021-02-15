<?php
	$conn=new PDO('sqlite:file.db') or die("Unable to open database!");
	$query="CREATE TABLE IF NOT EXISTS `file`(file_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, filename TEXT, location TEXT)";
 
	$conn->exec($query);
?>
