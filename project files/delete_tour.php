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



$sql="delete from tours where id=".$id;


if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
	//echo "<a href=\"admin.php\"> Back to admin page</a>";
	}
else {
    echo "Cannot Delete this tour is already booked by others";
}




$conn->close();
?>

