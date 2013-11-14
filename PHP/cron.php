<?php
	// This is a simple cron script you can use to track
	// your location over time. It uses the MySQL schema
	// pasted below.

	// CREATE TABLE `history` (
	//   `dt` datetime NOT NULL,
	//   `lat` decimal(10,6) NOT NULL,
	//   `lng` decimal(10,6) NOT NULL,
	//   UNIQUE KEY `dt` (`dt`)
	// )

	require 'class.sosumi.php';
	require 'settings.php';

	$ssm = new Sosumi(ICLOUD_ACCOUNT, ICLOUD_PASSWORD);

	$loc = $ssm->locate();

	if(strlen($loc['latitude']))
	{
		$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_NAME, $db) or die(mysql_error());

		$dt = date('Y-m-d H:i:s');
		$lat = mysql_real_escape_string($loc['latitude'], $db);
		$lng = mysql_real_escape_string($loc['longitude'], $db);

		$query = "INSERT INTO history (`dt`, `lat`, `lng`) VALUES ('$dt', '$lat', '$lng')";
		mysql_query($query, $db) or die(mysql_error());
	}
    echo("Location " . $loc['latitude'] . ", " . $loc['longitude'] . " added to Database with accuracy " . $loc['accuracy'] . "\n");
?>
