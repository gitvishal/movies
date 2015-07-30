<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "films";

//mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());

//mysql_select_db($dbname) or die(mysql_error());
$mysqli = new mysqli($dbhost,$dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
