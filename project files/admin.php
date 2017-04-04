<html>
<head>
<title>Comet Travels</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="index.js"></script>
<script>

function tour_list(){
		var xmlhttp;
		//alert("refreshing contents..!!!");
        if (window.XMLHttpRequest) {
           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","list_tours.php",true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				//alert("got reply");
            document.getElementById("tour_list").innerHTML = xmlhttp.responseText;
            }
        }
      
        xmlhttp.send();

}


function delete_tour(i1){
	var id=i1;
	//alert("The tour id is "+id);
   var xmlhttp;
	var str;
        if (window.XMLHttpRequest) {           
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
          xmlhttp.open("GET","delete_tour.php?id="+id,true);
          
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        str=xmlhttp.responseText;      
          alert(str);
		  tour_list();
          }
        }
      
        xmlhttp.send();
   
}






</script>

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

$flag=0;

if (isset($_REQUEST["u_name"]) && isset($_REQUEST["pswd"]))
{
	
$u_name= "'".$_REQUEST["u_name"]."'";
$pswd= $_REQUEST["pswd"];

$sql = "SELECT * FROM users where id=".$u_name;

$result = $conn->query($sql);


if ($result->num_rows == 0 || $_REQUEST["u_name"]!="admin") {
    
		?>
		
		<script>
			alert("Enter the correct login details..!!");
			window.location.href = 'admin_login.html';
		</script>
		<?php
		
	//echo "<br> enter the correct login details";
}

else{
	// output data of each row
    while($row = $result->fetch_assoc()) {
		$apswd=$row["pswd"];
	}
	
	if($pswd === $apswd){
		$flag=1;			
	}
	
	else{
		
		?>
		
		<script>
			alert("Enter the correct login details..!!");
			window.location.href = 'admin_login.html';
		
		</script>
		<?php
		
		//echo "<br> enter the correct login details";
	}


}	
	
	
}

else{
	$flag=1;
}

if($flag == 1)
{
	echo "<h1 class=\"page-header\"> Welcome admin</h1><br><br>
			<a class=\"btn btn-warning\" href=\"add_tour_form.html\"> Add Tour</a><br>";


	echo "<div id=\"tour_list\">";


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

	
echo "</div>";


}


$conn->close();


?>

	


</body>
</html>
