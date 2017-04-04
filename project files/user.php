<?php
session_start();
?>

<html lang="en">
<head>
 <!-- <link rel="icon" type="image/png" href="favicon.PNG">-->
  <title>Comet Travels</title>
 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="index.js"></script>
</head>

<body>
<div class="row">
<div class="container col-sm-12">
<div>  
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">About</a></li>
    <li><a data-toggle="tab" href="#menu2" onclick="listTours()">Tours</a></li>
	
    <li><a data-toggle="tab" href="#menu4" onclick="listOptions()"> My options</a></li>
	
	
	<li><a id="log" data-toggle="tab" href="#menu3" onclick="logout()">Log Out</a></li>
  </ul>
</div>


 <div class="tab-content">
  <div id="home" class="tab-pane fade in active">
	
    <h1 class="page-header">Packages for Every Budget!</h1>
    <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="1.JPG" alt="London" width="800" height="345">
      </div>

      <div class="item">
        <img src="3.jpg" alt="Tokyo" width="800" height="345">
      </div>
    
      <div class="item">
        <img src="10.jpg" alt="India" width="460" height="345">
      </div>

      <div class="item">
        <img src="30.jpg" alt="Switzerland" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="cardrev">  <blockquote class="blockquote-reverse">I had a wonderful India tour, my Children enjoyed a lot and it is affordable!<footer>Melissa</footer></blockquote></div>
<div class="cardrev">  <blockquote class="blockquote-reverse">You guys made my dream to be realized, i enjoyed all i dreamt of in Switzerland!<footer>John</footer></blockquote></div>
<div class="cardrev">  <blockquote class="blockquote-reverse">I just booked the tickets, everything is taken care of Comet's & I enjoyed a lot in London!<footer>Manoj</footer></blockquote></div>   
<div class="cardrev">  <blockquote class="blockquote-reverse">I just boarded the plane on time and just enjoyed the Trip.<footer>Fatima</footer></blockquote></div>
<div class="cardrev">  <blockquote class="blockquote-reverse">Went to singapore, came back, no problem, no worry<footer>Thurai Singh</footer></blockquote></div>   
 
   </div>

   <div id="menu1" class="tab-pane fade">
      <h2 class="page-header">About Us..!!</h2>
        <div class="cardrev">
  <img class="img-responsive" src="100.jpg" alt="office"/>
  <p> Office</p>
  </div>
  <h2>COMET TRAVELS</h2><h4>Established 1970<br><br><br>We are number one and upcoming in Dallas and we are fastly growing in the USA!<br><br><br>Office Number:(530)-(312)-1507.<br>Email: travel@comet.com</h4>
     
     
	 
   </div>

   <div id="menu2" class="tab-pane fade">
	<h2 class="page-header">List of Tours</h2>
  </div>

  
   <div id="menu4" class="tab-pane fade">
		
  </div>
  
  <div id="menu3" class="tab-pane fade">



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


	if ($result->num_rows == 0) {	
	
	?>
		<script>
			alert("Enter the correct login details");
			window.location.href = 'index.html';
		</script>
		<?php
	
	}

	else{
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$upswd=$row["pswd"];
			$_SESSION["uid"] = $row["id"];
		
		}	
	if($pswd === $upswd){
		$flag=1;
	}
	else{
		?>
		<script>
			alert("Enter the correct login details");
			window.location.href = 'index.html';
		</script>
		<?php
		
	}
}	
		
}

else{
	$flag=1;
}



	
if ($flag == 1 && isset($_SESSION["uid"])) {
  $uid = "'".$_SESSION["uid"]."'";
  echo "<h1>  Welcome  ".$uid."</h1><br><br><br>";
//  echo "<a class = \" btn btn-primary\" href=\"logout.php\"> logout</a><br><br><br>";

}
   

else {
  print("sign in before you come here before adding to wish list\n");
}





$conn->close();
?>


</div>
</div>
</div>
</div>

</body>
</html>