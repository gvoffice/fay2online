<?PHP include('../common/dbconnect.php'); ?>
<?PHP
$sql_tsales = "Select * from ord where ord_date = '" . date("Y-m-d") . "' and ord_canceled = 0";

$result_tsales = $conn->query($sql_tsales);
$tsales = 0;
while($row_tsales = $result_tsales->fetch_assoc()){
	
	$sql_tsales2 = "Select * from ordered_itms where ord_ID = '" . $row_tsales['ord_ID'] . "'";
	$result_tsales2 = $conn->query($sql_tsales2);
	while ($row_tsales2 = $result_tsales2->fetch_assoc()) {
		$tsales += $row_tsales2['price'];
		
	}
		
}
echo $tsales;
?>
