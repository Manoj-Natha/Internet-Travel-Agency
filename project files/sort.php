<?php

$search = $_GET['s'];
$son = $_GET['sp'];
// connect to database
$conn = new mysqli("localhost", "root", "root","online_travel_agency");

// Check the connection

if(trim($son)=="name")
{
$query="SELECT * FROM `tours` where start_date > CURDATE() AND name like '%".$search."%' order by name";
$sortTitle= "Name";
}//sql query
else if(trim($son)=="price")
{
$query="SELECT * FROM `tours` where start_date > CURDATE() AND name like '%".$search."%' order by cost";	
$sortTitle= "$ - $$$";
}
else if(trim($son)=="date")
{
$query="SELECT * FROM `tours` where start_date > CURDATE() AND name like '%".$search."%' order by start_date";	
$sortTitle= "Date";
}
else if(trim($son)=="pricerev")
{
$query="SELECT * FROM `tours` where start_date > CURDATE() AND name like '%".$search."%' order by cost DESC";
$sortTitle= "$$$ - $";
}
echo "<h2 class=\"page-header\">List of Tours</h2>";
echo "<div class=\"last input-group col-lg-4\">		 
	 
	<span><input id=\"input\" type=\"text\" name=\"text\" value=".$search.">
	<input class=\"btn btn-primary\" type=\"button\" value=\"search\" onclick=\"search()\">

	  <div class=\"dropdown\">
	  <div class=\"input-group-btn\">
        <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\" id=\"sortTitle\">Sort-By : ".$sortTitle." 
            <span class=\"caret\"></span> </button>
			<ul class=\"dropdown-menu\">
				<li onclick=\"sortName()\"><a href=\"#\">Name</a></li>
				<li onclick=\"sortPrice()\"><a href=\"#\"> $ - $$$ </a></li>
				<li onclick=\"sortPricerev()\"><a href=\"#\"> $$$$ - $ </a></li>
				<li onclick=\"sortDate()\"><a href=\"#\"> Date </a></li>
			</ul>
	 </div>
	 </div>
	 </span>	 
	 </div><br><br><br>";


$result = $conn->query($query);
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
		echo "<p>start date: ". $row["start_date"]."</p>";

		echo "<input class=\"btn btn-warning\" type=\"button\" value=\"Book Now\" onclick=\"book(".$row["id"].")\" />";

		
		echo "<input class=\"btn btn-warning\" type=\"button\" value=\"Favourite\" onclick=\"wish(".$row["id"].")\" /></div>";
		
		
		
    }
} else {
    echo "Nothing to display";
}

$conn->close();

?>