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


$sql = " SELECT wish_list.tid, tours.name, tours.description, tours.cost, tours.total_qty, tours.start_date 
		FROM wish_list
		LEFT JOIN tours
		ON wish_list.tid=tours.id
		where uid=".$uid." AND tours.start_date > CURDATE() order by tours.name ";

$result = $conn->query($sql);



echo "<h3 class=\"page-header\"> My Favourites</h3>";
if ($result->num_rows > 0) {
    // output data of each row
	
	//echo "<a class=\"btn btn-warning hist\" href=\"user.php\"> Back to user page</a><br>";

    while($row = $result->fetch_assoc()) {
		echo "<div class=\"card container col-sm-5\">";
		echo "<div class=\"cardin\">";
		echo "<img class=\"img-responsive\" src=\"".$row["tid"].".jpg\" alt=\"".$row["name"]."\"/>" ;
		echo "<p>" . $row["name"]. "</p>";
		echo "</div>";
        echo "<h3> Location : ". $row["name"]."</h3>";
		echo "<p>Tour No: ". $row["tid"]."</p>";		
		echo "<p>description: ". $row["description"]."</p>";
		echo "<p>cost: $". $row["cost"]."</p>";
		echo "<p>Tickets left: ". $row["total_qty"]."</p>";
		echo "<p>start date: ". $row["start_date"]."</p>";

		echo "<input class=\"btn btn-warning\" type=\"button\" value=\"Book Now\" onclick=\"fav_book(".$row["tid"].")\" /></div>";
    }
    } 
else {
    echo "<br><br><br>No Tours in your favourites List";
}


  
} else {
  echo "Sign in before adding to wish list";
}


$conn->close();


?>