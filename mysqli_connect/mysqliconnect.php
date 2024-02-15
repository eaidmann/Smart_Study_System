<?php

	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_USER', 'root');
	DEFINE('DB_PASS', '');
	DEFINE('DB_NAME', 'miniprojectdatabase');
	
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Failed to connect to MySQL ' .mysqli_connect_error());
?>