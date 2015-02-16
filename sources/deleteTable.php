<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "vidInventory.php";

if (isset($_POST['deleteTable'])) {
	$delete = 'DELETE FROM vid_inventory';
	if ($mysqli->query($delete) != TRUE) {
		echo "Error deleting videos!";
	}
}
$mysqli->close();

?>