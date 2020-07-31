<?php

$databaseHost = 'bdfc9gflv4ye6cduro7e-mysql.services.clever-cloud.com';
$databaseName = 'bdfc9gflv4ye6cduro7e';
$databaseUsername = 'uz0kam3uvljgu0zy';
$databasePassword = 'F5XrxL0iLbOOR1olsg7e';

try{
	// http://php.net/manual/en/pdo.connection.php
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}",$databaseUsername,$databasePassword);
	
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo $e->getMessage();
}
?>