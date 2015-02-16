<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'vidInventory.php';

if (isset($_POST['deleteVid'])) {
	$delete = 'DELETE FROM vid_inventory WHERE id='.$_POST["vidDel"];
	if ($mysqli->query($delete) != TRUE) {
		echo "Error deleting video!";
	}
}
$mysqli->close();

?>