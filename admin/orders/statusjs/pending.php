
<?php 
include('../../../common/dbconnect.php');
if(isset($_POST['ord_ID'])){
	$ord_ID = $_POST['ord_ID'];
}
if ($_GET['action']=='pending'){
$sql = "Update ord set ord_status = 'Pending' where ord_ID = '$ord_ID'";
//echo "1 $sql";
$conn->query($sql);
$sql = "Select * from ord where ord_ID = '$ord_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

if($row['ord_status'] == 'Pending'){
	echo "1";
}else {
	echo "Error!";
}
$conn->close();	
}

if ($_GET['action']=='processed'){
$sql = "Update ord set ord_status = 'Processed' where ord_ID = '$ord_ID'";
//echo "1 $sql";
$conn->query($sql);
$sql = "Select * from ord where ord_ID = '$ord_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

if($row['ord_status'] == 'Processed'){
	echo "1";
}else {
	echo "Error!";
}
$conn->close();	
}

if ($_GET['action']=='delivered'){
$sql = "Update ord set ord_status = 'Delivered' where ord_ID = '$ord_ID'";
//echo "1 $sql";
$conn->query($sql);
$sql = "Select * from ord where ord_ID = '$ord_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

if($row['ord_status'] == 'Delivered'){
	echo "1";
}else {
	echo "Error!";
}
$conn->close();	
}

if ($_GET['action']=='cancelled'){
$sql = "Update ord set ord_status = 'Cancelled' where ord_ID = '$ord_ID'";
//echo "1 $sql";
$conn->query($sql);
$sql = "Select * from ord where ord_ID = '$ord_ID'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

if($row['ord_status'] == 'Cancelled'){
	echo "1";
}else {
	echo "Error!";
}
$conn->close();	
}



?>