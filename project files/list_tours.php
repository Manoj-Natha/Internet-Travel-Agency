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

	$sql = "SELECT * FROM tours";


	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {				
		
		echo "<div class=\"card container col-sm-5\">";
		echo "<div class=\"cardin\">";
		echo "<img class=\"img-responsive\" src=\"".$row["id"].".jpg\" alt=\"".$row["name"]."\"/>" ;
		echo "<p>" . $row["name"]. "</p>";
		echo "</div>";
        echo "<h3> Location : ". $row["name"]."</h3>";
		echo "<p>Tour No: ". $row["id"]."</p>";
		echo "<p>description: ". $row["description"]."</p>";
		echo "<p>cost: $". $row["cost"]."</p>";
		echo "<p>start date: ". $row["start_date"]."</p>
		
		 <input class=\"btn btn-warning\" type=\"button\" value=\"Delete\" onclick=\"delete_tour(".$row["id"].")\" />
		
				<form action=\"http://localhost/edit_tour_form.php\" method=\"post\">
				<input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\">
				<input class=\"btn btn-warning\" type=\"submit\" value=\"edit\">
				</form></div>";
		}
	} 
	
	else {
		echo "0 results";
	}

		echo "</table>";
?>