<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?PHP include('../../common/dbconnect.php'); ?>
	
	<?PHP 
	
	$sql = "SELECT * from ord limit 0,3";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo "answer is ".mysqli_num_rows($result);
	?>
	
	<?PHP $conn->close(); ?>
</body>
</html>