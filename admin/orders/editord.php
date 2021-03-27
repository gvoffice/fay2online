<?php

$ord_ID=$_POST['ord_ID'];


include('../../common/dbconnect.php');

	$sql_ord = "Select * from ord where ord_ID = '$ord_ID'";
	$result_ord = $conn->query($sql_ord);
	$row_ord = $result_ord->fetch_assoc();
	$ord_name=$row_ord['ord_name'];
	$ord_phone=$row_ord['ord_phone'];
	$ord_bldnno=$row_ord['ord_bldnno'];
	$ord_way=$row_ord['ord_way'];
	$ord_city=$row_ord['ord_city'];
	$ord_payment=$row_ord['ord_payment'];
	$ord_note=$row_ord['ord_note'];
	
	
echo "
Name: <input class='form-control' type='text' name='name_$ord_ID' id='name_$ord_ID' value='$ord_name'><br>
Mobile: <input class='form-control' type='text' name='phone_$ord_ID' id='phone_$ord_ID' value='$ord_phone'><br>
Address: <br>
Building No.: <input class='form-control' type='text' name='bldnno_$ord_ID' id='bldnno_$ord_ID' value='$ord_bldnno'><br>
Way No.: <input class='form-control' type='text' name='way_$ord_ID' id='way_$ord_ID' value='$ord_way'><br>
City: 	<select class='form-control' name='city_$ord_ID' id='city_$ord_ID'>
			<option selected>$ord_city</option>";
	$sql_city = "Select * from city";
	$result_city = $conn->query($sql_city);
	while ($row_city = $result_city->fetch_assoc()){
		echo "<option>" . $row_city['c_name'] . " - ".$row_city['c_delchrg']." OMR</option>";
	}
		echo "</select><br>
Payment: 	<select class='form-control' name='payment_$ord_ID' id='payment_$ord_ID'>
		<option>$ord_payment</option>
		<option>Cash</option>
		<option>Card</option>
		<option>Bank Transfer</option>
		</select><BR>
Customer Note: <textarea class='form-control' name='note_$ord_ID' id='note_$ord_ID'>$ord_note</textarea><BR>
<div id='savesuccess' class='alert alert-success' role='alert'>
<B>Record saved successfully!!</B>
</div>
<button class='btn btn-info' id='$ord_ID'  onclick='saveeditord(this.id)'>Save</button><BR> 
";
?>

<script>
function saveeditord (ord_ID) {
	var ord_name = $('#name_'+ord_ID).val();
	var ord_phone = $('#phone_'+ord_ID).val();
	var ord_bldnno = $('#bldnno_'+ord_ID).val();
	var ord_way = $('#way_'+ord_ID).val();
	var ord_city = $('#city_'+ord_ID).val();
	var ord_payment = $('#payment_'+ord_ID).val();
	var ord_note = $('#note_'+ord_ID).val();

	
	$.ajax({
                url:'save_edit_ord.php',
                type:'post',
                data:{ord_ID:ord_ID,
				ord_name:ord_name,
				ord_phone:ord_phone,
				ord_bldnno:ord_bldnno,
				ord_way:ord_way,
				ord_city:ord_city,
				ord_payment:ord_payment,
				ord_note:ord_note},
                success:function(response){
					
                   $("#savesuccess").show(500).delay( 2000 ).hide( 500 );
				   
                }
            });

}
</script>

<?php
echo "<button id='$ord_ID' class='btn btn-info-outline btn-sm' style='color: blue' onclick='orderedItms(this.id)'><u>Edit Ordered Items</u></button><br>
<table class='table table-sm table-bordered'>
<thead>
<th>Item</th>
<th>Description</th>
<th>QTY</th>
<th>Price</th>
</thead>
<tbody>";
$sql_ordered_itms = "	SELECT * from ordered_itms where ord_ID = '$ord_ID'";
	$result_ordered_itms = $conn->query($sql_ordered_itms);
	while ($row_ordered_itms = $result_ordered_itms->fetch_assoc()){
		$itm_ID = $row_ordered_itms['itm_ID'];
		$qty = $row_ordered_itms['qty'];
		$price = $row_ordered_itms['price'];
						$sql_product = "Select * from product where itm_ID = $itm_ID";
						$result_product = $conn->query($sql_product);
						$row_product = $result_product->fetch_assoc();
						$itm_name = $row_product['itm_name'];
						$itm_desc = $row_product['itm_desc'];
		echo "<tr>
				<td>$itm_name</td>
				<td>$itm_desc</td>
				<td>$qty</td>
				<td>$price</td>
		</tr>";
	}
echo "</tbody>
</table>

<button class='btn btn-secondary' id='$ord_ID'  onclick='vieword(this.id)'>Back</button>
";


$conn->close();
?>