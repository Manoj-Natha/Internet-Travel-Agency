<?php

$name = $_GET['q'];
$name="'".$name."'";
$pwd = $_GET['pas'];
$pwd="'".$pwd."'";
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


$sql="select id from users where id=".$name."AND pswd=".$pwd;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
    // output data of each row
     echo $row["id"];}
}

else{
	echo "0";
}


$conn->close();
?>