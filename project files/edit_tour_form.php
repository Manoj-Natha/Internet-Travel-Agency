<html>
<head>

 <!-- <link rel="icon" type="image/png" href="favicon.PNG">-->
  <title>Comet Travels</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="index.js"></script>

<script src="jquery-1.9.1.min.js"></script>
<script src="add_user.js"></script>
</head>
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
$sql = "SELECT * FROM tours where id=".$id;
$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
    	
		$id=$row["id"];		
        $name=$row["name"];
		$desc=$row["description"];
		$cost=$row["cost"];
		$total_qty=$row["total_qty"];
		$start_date=$row["start_date"];
		
    }
?>

<body>

<form class="addusrp" action="http://localhost/edit_tour.php"  method="post">
	<div class="container col-sm-2">
			<p class="addusrp">Tour ID: </p>		
			<p class="addusrp">Name:</p>
			<p class="addusrp">Description:</p>
			<p class="addusrp">Cost:</p>
			<p class="addusrp">Total Qty:</p>
			<p class="addusrp">Start Date: </p>
			
</div>
<div class="addusrp container col-sm-10">
 <input type="text" name="id" required="true" value="<?= $id ?>" readonly><br>
 <input type="text" name="name" required="true" value="<?= $name ?>"><br>
 <input type="textarea" rows="4" cols="50" name="description" required="true" value="<?= $desc ?>"><br>
<input type="text" name="cost" required="true" value="<?= $cost ?>"><br>
<input type="text" name="total_qty" required="true" value="<?= $total_qty ?>"><br>
 <input type="text" name="start_date" required="true" value="<?= $start_date ?>"><br>
<br>
	<input class="btn btn-warning" type="submit" value="Update Tour">	
</div>
</form>


</body>
</html>