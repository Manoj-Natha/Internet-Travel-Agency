<?php
session_start();
 /*echo "<title>Comets Travel's</title>
  <link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"index.css\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>
  <script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
  <script type=\"text/javascript\" src=\"index.js\"></script>";
*/

if (isset($_SESSION["uid"])) {
 	$uid = "'".$_SESSION["uid"]."'";
 	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "online_travel_agency";
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "failed to connect to server ";
} 

$tid = $_REQUEST["id"];
$sql = "SELECT * FROM tours where id=".$tid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {		
while($row = $result->fetch_assoc()) {
    	$tid=$row["id"];
		$_SESSION["tid"] = $tid;
		
        $name=$row["name"];		
		$cost=$row["cost"];
		$_SESSION["cost"] = $cost;
		
		$total_qty=$row["total_qty"];
		$_SESSION["total_qty"] = $total_qty;
		
		$start_date=$row["start_date"];
		$desc=$row["description"];
    }
}

echo "<h1 class=\"page-header\">".$name."</h1>
<form action=\"http://localhost/purchase.php\" method=\"post\">
<input type=\"hidden\" name=\"tid\" value= \"".$tid."\" required=\"true\"><br>
<input type=\"hidden\" name=\"name\" value= \"".$name."\" required=\"true\"><br>
Quantity: <input type=\"number\" name=\"qty\" required=\"true\"><br><br><br>
<input class=\"btn btn-warning\" type=\"submit\" value=\"Purchase\">
</form>";	
} 

else {
	echo "Please Sign in to book tickets";
  }

	
?>


