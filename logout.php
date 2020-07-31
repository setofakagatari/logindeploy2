<?php
	require 'configlogin.php';
	session_destroy();
	
	header('Location: index.html');
?>