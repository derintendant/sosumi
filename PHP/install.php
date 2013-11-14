<?php
	require('settings.php');

	$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	mysql_select_db(DB_NAME, $db) or die(mysql_error());

	$query= "CREATE TABLE `history` ( `dt` datetime NOT NULL, `lat` decimal(10,6) NOT NULL, `lng` decimal(10,6) NOT NULL, UNIQUE KEY `dt` (`dt`) )";

	$result = mysql_query($query, $db) or die(mysql_error());
	if ($result) {
		echo "Successfully created Database tables";
	}

?>