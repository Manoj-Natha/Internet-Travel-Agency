<?php
session_start();
/*

echo "<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\">";
echo "<link rel=\"stylesheet\" href=\"index.css\">";
echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\"></script>";
echo "<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>";
  
*/

if (isset($_SESSION["uid"])) {
  $uid = "'".$_SESSION["uid"]."'";
//  print("You are signed in as $uid \n");
  
  
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

		$sql = " SELECT tours.id, tours.name, tours.cost, tours.description, tours.start_date,orders.tcost,orders.qty
		FROM orders
		LEFT JOIN tours
		ON orders.tid=tours.id
		where orders.uid=".$uid;

		
$result = $conn->query($sql);

echo "<h3 class=\"page-header\"> My Order list</h3>";
if ($result->num_rows > 0) {
    // output data of each row
	
	//echo "<a class=\"btn btn-warning hist\" href=\"user.php\"> Back to user page</a><br>";

    while($row = $result->fetch_assoc()) {
		echo "<div class=\"card container col-sm-5\">";
		echo "<div class=\"cardin\">";
		echo "<img class=\"img-responsive\" src=\"".$row["id"].".jpg\" alt=\"".$row["name"]."\"/>" ;
		echo "<p>" . $row["name"]. "</p>";
		echo "</div>";
        echo "<h3> Location : ". $row["name"]."</h3>";
		echo "<p>Tour No: ". $row["id"]."</p>";
		echo "<p>description: ". $row["description"]."</p>";
		echo "<p>order cost: $". $row["tcost"]."</p>";
		echo "<p>Tickets purchased: ". $row["qty"]."</p>";
		echo "<p>start date: ". $row["start_date"]."</p></div>";			
    }
    } 
else {
    echo "<br><br><br>You don't have any purchases";
}

  
  
} else {
  print("sign in before adding to order list\n");
}




$conn->close();


?>