<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "vidInventory.php";

$mysqli3 = new mysqli("oniddb.cws.oregonstate.edu", "brancalr-db", $myPassword, "brancalr-db");
$sql3 = "SELECT id, name, category, length, rented FROM vid_inventory";
$result3 = mysqli_query($mysqli3, $sql3);

if ($_POST["catFilt"] == "All Movies") {
	exit;
}

if ($result3->num_rows > 0) {
	echo "<table border=1><tr><th>Name</th><th>Category</th><th>Length(min)</th><th>In Stock</th></tr>";
	while ($row3 = $result3->fetch_assoc()) {
		if ($row3["rented"] == 0){
			$rented3 = "Available";
		}
		if ($row3["rented"] == 1) {
			$rented3 = "Checked out";
		}
		if ($_POST["catFilt"] == $row3["category"]) {
			echo "<tr><td>" . $row3["name"]. "</td><td>". $_POST['catFilt']. "</td><td>". $row3["length"]. "</td><td>". $rented3. "</td>";
			echo "</tr></form>";
		}
	}
	echo "</table>";
}
$mysqli3->close();

?>