/*<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'vidInventory.php';

$conn = new mysqli("oniddb.cws.oregonstate.edu", "brancalr-db", $myPassword, "brancalr-db");
if ( $conn->connect_errno ) {
	echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") ". $conn->connect_errno;

$sq1 = "UPDATE vid_inventory SET rented = '1'";
$sq2 = "UPDATE vid_inventory SET rented = '0'";


	if ($_POST['inOut'] == 0) {
		mysqli_query($conn, $sq1);
		header("Location: http://web.engr.oregonstate.edu/~brancalr/vidInventory.php")
	}
	else {
		mysqli_query($conn, $sq2);
	}
}
if ($_POST['inOut'] == 0) {
	echo "UPDATE vid_inventory SET rented = '1' WHERE'". $_POST['inOut']."'= 0";
}
if ($_POST['inOut'] == 1) {
	echo "UPDATE vid_inventory SET rented = '0' WHERE'". $_POST['inOut']."' = 1";
}*/

?>