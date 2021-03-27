<?PHP  
include('../../../common/dbconnect.php'); 

$ord_ID = $_POST['ord_ID'];
$sql = "Select * from ord where ord_ID = '$ord_ID'";
$result = $conn->query($sql);
$row_ord = $result->fetch_assoc();

$ord_name = $row_ord['ord_name'];
$ord_phone = $row_ord['ord_phone'];
$ord_city = $row_ord['ord_city'];
$ord_way = $row_ord['ord_way'];
$ord_bldnno = $row_ord['ord_bldnno'];
$del_date = $row_ord['del_date'];
$del_time = $row_ord['del_time'];
$ord_note = $row_ord['ord_note'];
$ord_payment = $row_ord['ord_payment'];

echo"
<div class='alert alert-info'><strong>Name</strong>:  $ord_name</div>
<div class='alert alert-info'><strong>Mobile</strong>:  $ord_phone</div>
<div class='alert alert-info'><strong>Address</strong>:  Building: $ord_bldnno / Way No. $ord_way / Area: $ord_city</div>
<div class='alert alert-info'><strong>Payment</strong>:  $ord_payment</div>
<div class='alert alert-danger'><strong>Customer Notes</strong>:  $ord_note</div>
";
?>
<table class="table table-sm">
<thead>
	<th>Item</th>
	<th>Description</th>
	<th>QTY</th>
	<th>Price</th>
	</thead>
	<tbody>
	<?PHP 
		$sql = "Select * from ordered_itms where ord_ID = '$ord_ID'";
		$result = $conn->query($sql);
		while($row_itm = $result->fetch_assoc()){
		$itm_ID = $row_itm['itm_ID'];
		$sql_prd = "SELECT * from product where itm_ID = $itm_ID";
		$r_prd = $conn->query($sql_prd);
			$row_prd = $r_prd->fetch_assoc();
			$itm_name=$row_prd['itm_name'];
			$itm_desc = $row_prd['itm_desc'];
			$qty = $row_itm['qty'];
			$price = $row_itm['price'];
		echo "
		<tr>
		<td>$itm_name</td>
		<td>$itm_desc</td>
		<td>$qty</td>
		<td>$price</td>
		</tr>
		";
			
		}
		?>
	</tbody>
</table>
</div>
<div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary' id="<?php echo $ord_ID ?>"  onclick='copyord(this.id)'>
        	Copy
     	</button>
     	<button type='button' class='btn btn-primary' id="<?php echo $ord_ID ?>"  onclick='vieword(this.id)'>
        	View
     	</button>
     	<button type='button' class='btn btn-danger' id="<?php echo $ord_ID ?>"  onclick='cancelord(this.id)'>
		 Mark Cancelled
     	</button>
		<button type='button' class='btn btn-warning' id="<?php echo $ord_ID ?>"  onclick='editord(this.id)'>
        	Edit
     	</button>
      </div><div>
<?php $conn->close(); ?>