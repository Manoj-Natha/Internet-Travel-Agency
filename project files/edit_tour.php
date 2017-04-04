<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "online_travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$name = "'".$_REQUEST["name"]."'";
$desc= "'".$_REQUEST["description"]."'";
$cost = $_REQUEST["cost"];
$total_qty = $_REQUEST["total_qty"];
$start_date = $_REQUEST["start_date"];
$start_date = "'".$_REQUEST["start_date"]."'";


$sql= "UPDATE tours SET name=".$name.", cost=".$cost.", description=".$desc.", total_qty=".$total_qty.", start_date=".$start_date." WHERE id=".$id;


if ($conn->query($sql)=== TRUE) {
?>
	<script type="text/javascript">
		alert("updated record successfully");
	</script>

<?php	
	}

else {
?>

	<script type="text/javascript">
		alert("Not upadated..!! Error in the inputs");
	</script>
	

<?php


}

$conn->close();
?>

<script type="text/javascript">
window.location.href = 'admin.php';
</script>

