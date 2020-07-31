<?php 
session_start();

define('dbhost', 'bdfc9gflv4ye6cduro7e-mysql.services.clever-cloud.com');
define('dbuser', 'uz0kam3uvljgu0zy');
define('dbpass', 'F5XrxL0iLbOOR1olsg7e');
define('dbname', 'bdfc9gflv4ye6cduro7e');

try {
	$connect = new PDO("mysql:host=".dbhost.";dbname=".dbname,dbuser,dbpass);
	$connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>