<title>Comet Travels</title>
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
$stmt = $conn->prepare("INSERT INTO tours (id, name, cost, total_qty, start_date, desc) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sss", $id, $name, $cost, $total_qty, $start_date, $desc);

// set parameters and execute

*/

$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$name = "'".$_REQUEST["name"]."'";
$desc = "'".$_REQUEST["description"]."'";
$cost = $_REQUEST["cost"];
$total_qty = $_REQUEST["total_qty"];
$start_date = $_REQUEST["start_date"];
$start_date = "'".$_REQUEST["start_date"]."'";





//$sql="INSERT INTO tours (id, name, cost, total_qty, start_date, desc) VALUES (".$id.",".$name.",".$cost.",".$total_qty.", ".$start_date.",".$desc.")";

$sql="INSERT INTO tours (id, name, description, cost, total_qty, start_date) VALUES (".$id.",".$name.",".$desc.",".$cost.",".$total_qty.", ".$start_date.")";


if ($conn->query($sql) === TRUE) {
if (!empty($_FILES["uploadedimage"]["name"])) {

    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    //$ext= GetImageExtension($imgtype);
    $imagename=$id.".jpg";
    $target_path = $imagename;
    move_uploaded_file($temp_name, $target_path);   


}

?>
	<script type="text/javascript">
		alert("Inserted successfully");
	</script>

<?php	
}
	
else {
?>

	<script type="text/javascript">
		alert("Not Inserted..!! Tour Id already exists");
	</script>
	

<?php

}



$conn->close();
?>


<script type="text/javascript">
window.location.href = 'admin.php';
</script>
