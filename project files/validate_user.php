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

$id = "'".$_REQUEST["userid"]."'";
$email = "'".$_REQUEST["email"]."'";
$type = $_REQUEST["type"];

if($type == "username")
{
$sql="SELECT id FROM users WHERE id = ".$id;
$result = $conn->query($sql);
}
else if($type == "email")
{
$sql="SELECT email FROM users WHERE email = ".$email;
$result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    echo "no";
} else {
    echo "ok";
}

$conn->close();
?>