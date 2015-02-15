<?php

if (isset($_POST['rented'])) {
	if ($_POST['inOut'] == 0) {
		$rented = "Checked out";
	}
	else {
		$rented = "Available";
	}
}
header("Location: http://web.engr.oregonstate.edu/~brancalr/vidInventory.php");

?>