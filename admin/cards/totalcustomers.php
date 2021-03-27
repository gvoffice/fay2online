<?PHP include('../common/dbconnect.php'); ?>
<?PHP
$sql_tsales = "Select distinct ord_name from ord where ord_canceled = 0";

$result_tsales = $conn->query($sql_tsales);
$tsales = 0;
while($row_tsales = $result_tsales->fetch_assoc()){
	
	
		$tsales +=1;
		
	
	
}
echo $tsales
?>
