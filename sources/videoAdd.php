<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'vidInventory.php';

$name = $_POST['name'];
$category = $_POST['category'];
$length = $_POST['length'];

if (strlen($name) == 0) {
	echo "Movie name missing! Please reenter!<br>";
	exit;
}
if (!is_numeric($length)) {
	echo "Movie length invalid! Please reenter!<br>";
	exit;
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
