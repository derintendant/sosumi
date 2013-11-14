<?php

require("settings.php");

// Start XML file, create parent node
$doc = new DOMDocument("1.0");
$parnode = $doc->appendChild(new DOMElement("markers"));

// Opens a connection to a MySQL server
$connection=mysql_connect (DB_HOST, DB_USER, DB_PASSWORD);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db(DB_NAME, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM history WHERE 1 ORDER BY dt DESC-- LIMIT 24";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $newnode = $parnode->appendChild(new DOMElement("marker"));

  $newnode->setAttribute("dt", $row['dt']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
}

$xmlfile = $doc->saveXML();
echo $xmlfile;

?>