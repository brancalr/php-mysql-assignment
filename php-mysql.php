<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'storedPW.php';

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "brancalr-db", $myPassword, "brancalr-db");
if ( $mysqli->connect_errno ) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_errno;
}
else {
	echo "Connection successful!<br>";
}
?>

<!--<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>PHP-MySQL</title>
	</head>
	<body>
	  <fieldset>
	    <input type="text" name="name" value="Name">
	    <input type="text" name="category" value="Category">
	    <input type="text" name="length" value="Length"><br>
	    <input type="submit" value="Add Video">
	  </fieldset>
	</body>
</html> -->