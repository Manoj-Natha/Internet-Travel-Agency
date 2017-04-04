<?php
session_start();
if (isset($_SESSION["uid"])) {
  $uid = "'".$_SESSION["uid"]."'";
} else {
  echo "Please sign in to add to favourites";
}

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



$tid = "'".$_REQUEST["id"]."'";


$sql="INSERT INTO wish_list (uid, tid) VALUES (".$uid.",".$tid.")";


if ($conn->query($sql) === TRUE) {
    echo "Added to favourites successfully";
	}
	
else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
	$error=$conn->error;
	if (strpos($error, 'Duplicate') !== false) {
    echo 'Tour already exists in favourites';
	}

}


$conn->close();
?>
