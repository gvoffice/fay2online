<?PHP include('../../common/dbconnect.php'); ?>


<table width="100%">
	<thead>
	<th>Date</th>
	<th>Customer Name</th>
	<th>Order ID</th>
	<th>Status</th>
	<th>Action</th>
	</thead>
	<tbody>
	
<?PHP 	
		$r_start = 0;
		$r_status = null;
		$r_p_p = 5;
		$r_o_by = "DESC";
if(isset($_POST['r_start'])){
	$r_start = $_POST['r_start'];
}
if(isset($_POST['r_status']) && $_POST['r_status'] != "all"){
	$r_status = $_POST['r_status'];
	$r_status_sql = " AND ord_status = '".$_POST['r_status']."' ";
}else {$r_status_sql = "";}
if(isset($_POST['r_from_date']) && $_POST['r_from_date'] != ""){
	$r_from_date = $_POST['r_from_date'];
	$r_from_date_sql = " AND ord_Date >= '".$_POST['r_from_date']."' ";
}else {$r_from_date_sql = "";}
if(isset($_POST['r_to_date']) && $_POST['r_to_date'] != ""){
	$r_to_date = $_POST['r_to_date'];
	$r_to_date_sql = " AND ord_Date <= '".$_POST['r_to_date']."' ";
}else {$r_to_date_sql = "";}
if(isset($_POST['r_p_p'])){
	$r_p_p = $_POST['r_p_p'];
	$r_p_p_sql = "LIMIT $r_start," . $_POST['r_p_p'] ." ";
}else {$r_p_p_sql = "LIMIT 0,5 ";}
if(isset($_POST['r_o_by'])){
	$r_o_by = $_POST['r_o_by'];
	$r_o_by_sql = " Order By ord_Date ".$_POST['r_o_by'];
}else{$r_o_by_sql = " Order By ord_Date DESC";}

		
$sqlord = "Select * from ord where 1 $r_status_sql $r_from_date_sql $r_to_date_sql $r_o_by_sql";
$result_ord = $conn->query($sqlord);
$r_count = mysqli_num_rows($result_ord);		
$sqlord = "Select * from ord where 1 $r_status_sql $r_from_date_sql $r_to_date_sql $r_o_by_sql $r_p_p_sql";
$result_ord = $conn->query($sqlord);
//echo $sqlord;
while ($row_ord = $result_ord->fetch_assoc()){
	$ord_status = $row_ord['ord_status'];
	switch ($ord_status){
		case "Pending":
			$tr_bg = "style='background-color:rgba(235,220,50,0.5);border-bottom-style: solid;
			border-bottom-width: thin;'";
			break;
		case "Cancelled":
			$tr_bg = "style='background-color:rgba(235,50,50,0.5);border-bottom-style: solid;
			border-bottom-width: thin;'";
			break;
		case "Processed":
			$tr_bg = "style='background-color:rgba(50,50,235,0.5);border-bottom-style: solid;
			border-bottom-width: thin;'";
			break;
		case "Delivered":
			$tr_bg = "style='background-color:rgba(50,235,50,0.5);border-bottom-style: solid;
			border-bottom-width: thin;'";
			break;
	}
	
	$ord_ID = $row_ord['ord_ID'];
	echo "<tr ".$tr_bg." id='ord_".$row_ord['ord_ID']."'>
		<td nowrap>".$row_ord['ord_Date']."</td>
		<td nowrap>".$row_ord['ord_name']."</td>
		<td nowrap>".$row_ord['ord_ID']."</td>
		<td nowrap id='status$ord_ID'>".$row_ord['ord_status']."</td>
		<td nowrap> 
			<span class='material-icons   btn-outline-dark' data-toggle='modal' data-target='#ordModal' id='".$row_ord['ord_ID']."' onclick='vieword(this.id)'>preview</span>
			<span class='material-icons   btn-outline-dark' id='".$row_ord['ord_ID']."' onclick='markpending(this.id)'>pending</span>
			<span class='material-icons   btn-outline-dark' id='".$row_ord['ord_ID']."' onclick='markprocessed(this.id)'>done</span>
			<span class='material-icons   btn-outline-dark' id='".$row_ord['ord_ID']."' onclick='markdelivered(this.id)'>local_shipping</span>
		
		</td>
</tr>";
	
}


?>
		
	</tbody>
</table>

<div id="loader" style="width: 100%;margin-bottom: 50px"><center>
<?PHP 
	
	$page_count = intdiv($r_count,$r_p_p); //r_count is the total records from SQL and r_p_p is the selected number of records per page in the index.php
	
	if (($r_count / $r_p_p) > $page_count ){ 
		$page_count++;
		
	}
	//echo $page_count .$r_count. $r_p_p;
	for ($i = 1; $i <= $page_count; $i++){
		$pnum_display = $r_p_p * $i;
		$display_start = $pnum_display - $r_p_p;
		if (is_null($r_status)){
			$r_status = "all";
		}
		echo "<button id='pnum$i' pnum='$i' rstatus='$r_status' ordBy='$r_o_by' class='pnum' onclick='DataReload($display_start,$r_p_p,this.id)' style='border-radius: 10px;
		background: burlywood;'> $i </button>";
	}
	//echo  "count: $r_count rpp: " . $r_p_p." r_status: $r_status r_status_sql = $r_status_sql";
	$conn->close();
	
	
	
	?>
	</center>
	
	<?PHP include('modal.php') ?>
</div>