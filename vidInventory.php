<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include 'storedPW.php';

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "brancalr-db", $myPassword, "brancalr-db");
if ( $mysqli->connect_errno ) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") ". $mysqli->connect_errno;
}
/*else {
	echo "Connection successful!<br>";
}*/

$sql = "SELECT id, name, category, length, rented FROM vid_inventory";
$result = mysqli_query($mysqli, $sql);

if ($result->num_rows > 0) {
	echo "<table border=1><tr><th>Name</th><th>Category</th><th>Length(min)</th><th>In Stock</th><th>Delete Video</th></tr>";
	while ($row = $result->fetch_assoc()) {
		if ($row["rented"] == 0){
			$rented = "Available";
		}
		if ($row["rented"] == 1) {
			$rented = "Checked out";
		}
		echo "<tr><td>" . $row["name"]. "</td><td>". $row["category"]. "</td><td>". $row["length"]. "</td>";
		echo "<form action='rented.php' method='POST'>";
		echo "<input type='hidden' name='inOut' value='".$row['rented']."'/>";
		echo "<td><input type='submit' name='rented' value='Check In/Out'/>". $rented. "</td>";
		echo "<form action='deleteRow.php' method='POST'>";
		echo "<input type='hidden' name='vidDel' value='".$row['id']."'/>";
		echo "<td><input type='submit' name='deleteVid' value='Delete'/></td></tr></form>";
		//echo "<td><button onclick='$rented=1'>Check-In/Out</button></td>";
	}
	echo "<form action='deleteTable.php' method='POST'>";
	echo "<input type='submit' name='deleteTable' value='Delete All Videos'/></form>";
	echo "</table>";
}

$sql2 = "SELECT DISTINCT category FROM vid_inventory";
$result2 = mysqli_query($mysqli, $sql2);

if ($result2->num_rows > 0) {
	echo "<form action='catFilter.php' method='POST'>";
	echo "<br><select name='catFilt'>";
	while ($row2 = $result2->fetch_assoc()) {
		foreach ($result2 as $row2){
			echo "<option>".$row2['category']."</option>";	
		}
		echo "<option>All Movies</option";
		echo "</select>";
		echo "<input type='submit' value='Filter'/></form>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Video Inventory</title>
	</head>
	<body>
	  <fieldset>
	    <form action="videoAdd.php" method="POST">
	    Add Video:<br>
	    <input type="text" name="name" value="Name">
	    <input type="text" name="category" value="Category">
	    <input type="text" name="length" value="Length"><br>
	    <input type="submit" value="Add Video">
	  </fieldset>
	</body>
</html> 