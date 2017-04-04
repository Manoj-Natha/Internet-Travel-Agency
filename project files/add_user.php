
<html lang="en">
<head>
 <!-- <link rel="icon" type="image/png" href="favicon.PNG">-->
  <title>Bootstrap Practise</title>
 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="index.js"></script>
</head>

<body>

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

/*
$stmt = $conn->prepare("INSERT INTO users (id, pswd, fname, lname, gender, dob, email, pno, addr) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sss", $id, $name, $cost, $total_qty, $start_date, $desc);

// set parameters and execute

*/

$id = "'".$_REQUEST["id"]."'";
$pswd = "'".$_REQUEST["pswd"]."'";
$fname = "'".$_REQUEST["fname"]."'";
$lname = "'".$_REQUEST["lname"]."'";
$gender = "'".$_REQUEST["gender"]."'";
$dob = "'".$_REQUEST["dob"]."'";
$email = "'".$_REQUEST["email"]."'";
$pno = $_REQUEST["pno"];
$addr = "'".$_REQUEST["addr"]."'";

$sql="INSERT INTO users (id, pswd, fname, lname, gender, dob, email, pno, addr) VALUES (".$id.",".$pswd.",".$fname.",".$lname.",".$gender.",".$dob.",".$email.",".$pno.",".$addr.")";


if ($conn->query($sql) === TRUE) {
    
    ?>
    
<script type="text/javascript">
alert("Account created Successfully!");
</script><?php  
    }
    
else {?>
    
<script type="text/javascript">
alert("Error cattching server please try again later, sorry for the inconvinience");
</script><?php

}

$conn->close();
?>

<script type="text/javascript">
window.location.href = 'index.html';
</script>

<body>
</html>
