<?php	

session_start();


if (isset($_SESSION["uid"])) {
  $uid = "'".$_SESSION["uid"]."'";
  $tid = "'".$_SESSION["tid"]."'";
  $cost = $_SESSION["cost"];
  $total_qty = $_SESSION["total_qty"];
  

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

$qty = $_REQUEST["qty"];

if ($qty > $total_qty)
{?>
<script type="text/javascript">
alert("Requested quantity of tickets not available");
window.location.href = 'user.php';
</script>
<?php
}		
else
{
	$sql = "SELECT * FROM orders order by id desc";
	$result = $conn->query($sql);

	if($row = $result->fetch_assoc()) {
    	
		$oid=$row["id"];		
    }
	else{
		$oid=999;
	}
	
	$oid=$oid+1;	
	$total_qty = $total_qty - $qty;
	
	
	$sql= "UPDATE tours SET total_qty=".$total_qty." WHERE id=".$tid;
	
	$conn->query($sql);

	$tcost = $cost * $qty;	
	$sql="INSERT INTO orders (id, uid, tid, qty, tcost) VALUES (".$oid.",".$uid.",".$tid.",".$qty.",".$tcost.")";

	if ($conn->query($sql) === TRUE) {?>
<script type="text/javascript">
alert("Tickets booked successfully, you can view in purchase history");
window.location.href = 'user.php';
</script>
	<?php
	
	}
	else {?>
<script type="text/javascript">
alert("Cannot connect to server, try again later");
window.location.href = 'user.php';
</script>

	<?php
		}
}

  
} 
else {?>
<script type="text/javascript">
alert("Login before booking");
window.location.href = 'index.html';
</script>

<?php
  }


	echo "<a href=\"user.php\"> Back to user page</a>";



?>

