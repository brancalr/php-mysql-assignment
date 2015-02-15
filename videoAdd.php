<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'vidInventory.php';

$name = $_POST['name'];
$category = $_POST['category'];
$length = $_POST['length'];

if (gettype($name) != "string" || is_null($name)) {
	echo "Invalid input for name!<br>";
}
if (gettype($category) != "string" || is_null($name)) {
	echo "Invalid input for category!<br>";
}
if (gettype($length) != "string" || is_null($name)) {
	echo "Invalid input for length!<br>";
}

if (!($stmt = $mysqli->prepare("INSERT INTO vid_inventory(name, category, length) VALUES(?, ?, ?)"))) {
	echo "Prepare failed: (". $mysqli->errno . ") ". $mysqli->error;
}
if (!$stmt->bind_param("ssi", $name, $category, $length)) {
	echo "Binding parameters failed: (". $stmt->errno . ") ". $stmt->error;
}
if (!$stmt->execute()) {
	echo "Execute failed: (". $stmt->errno. ") ". $stmt->error;
}
$stmt->close();
?>
