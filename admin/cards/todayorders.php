<?PHP include('../common/dbconnect.php'); ?>
<?PHP
$sql_torders = "Select * from ord where ord_date = '" . date("Y-m-d") . "' and ord_canceled = 0";

$result_torders = $conn->query($sql_torders);
$torders = 0;
while($row_torders = $result_torders->fetch_assoc()){
	
	$torders += 1;
	/*$sql_torders2 = "Select * from ordered_itms where ord_ID = '" . $row_torders['ord_ID'] . "'";
	$result_torders2 = $conn->query($sql_torders2);
	while ($row_torders2 = $result_torders2->fetch_assoc()) {
		$torders += 1;
		
	}*/
	
}
if ($torders <1){
	$torders = 0;
}
echo $torders;

?>
<?PHP $conn->close(); ?>