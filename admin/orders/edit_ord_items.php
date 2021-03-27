<?php
include('../../common/dbconnect.php');
$ord_ID=$_POST['ord_ID'];




echo "
<table class='table table-sm table-bordered round' it='itemsTable'>
<thead>
<th>Remove</th>
<th>Category</th>
<th style='max-width: 300px'>Item</th>
<th>Description</th>
<th style='min-width:135px'>QTY</th>
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
						$itm_category = $row_product['itm_category'];
		echo "<tr id='tr_$itm_ID'>
				<td><button data-ordid='$ord_ID' class='btn btn-danger' id='$itm_ID' onclick='delorditm(this) ' ><span class='material-icons'>delete_outline</span></button></td>
				<td id='desc$itm_ID'>$itm_category</td>
				<td id='name$itm_ID'>$itm_name</td>
				
				<td id='desc$itm_ID'>$itm_desc</td>
				<td ><input type='text' id='qty$itm_ID' value='$qty' style='width:40px; z-index:1056'>
				<button data-ope='plus' data-itmid='$itm_ID' data-ordid='$ord_ID' class='material-icons btn-success' onclick='addqty(this)'>add_circle</button>
				<button data-ope='sub' data-itmid='$itm_ID' data-ordid='$ord_ID'  class='material-icons btn-danger'onclick='addqty(this)'>remove_circle</button></td>
				<td id='price$itm_ID'>$price</td>
		</tr>";
	}


echo "</tbody>
</table>

<button class='btn btn-sm btn-success mb-5' onclick='add_itm(this.id)' id='$ord_ID'>Add</button><br>

<button class='btn btn-secondary' id='$ord_ID'  onclick='editord(this.id)'>Back</button>
";
$conn->close();
?>
<script>
function addqty(theobject){
	var operation = $(theobject).attr('data-ope');
	var ord_ID = $(theobject).attr('data-ordid');
	var itm_ID = $(theobject).attr('data-itmid');
	var obqtyid = "#qty" + itm_ID;
	var currentvalue = $(obqtyid).val();

	if (operation == "plus"){
	var newvalue = parseInt(currentvalue) + 1;
	}else {
		var newvalue = parseInt(currentvalue) - 1;
	}
	/*alert ("ord_ID: " + ord_ID);
	alert ("itm_ID: " + itm_ID);
	alert ("qty object name: " + obqtyid);
	alert ("current value: " + currentvalue);
	alert ("New Value: " + newvalue);  */
	$.ajax({
		url:"addremoveitems.php",
		type: "post",
		data: {ord_ID:ord_ID,itm_ID:itm_ID,qty:newvalue},
		success:function(response){
			
				$(obqtyid).val(newvalue);
				$("#price"+itm_ID).html(response)
			
			
		}
	})

	$(obqtyid).val(newvalue);
}

function add_itm(ord_ID){
	//$("#edititmsord").hide();
	
	$.ajax({
		url: "newitem/add_new.php",
		type: 'post',
		data: {ord_ID:ord_ID,action:'showcat'},
		success:function(response){
			//alert ('the response is (' + response + ')');
			//$('#ord_' + ord_ID).attr('class','bg-danger');
			//alert ('Order ('+ ord_ID +') is Marked as --Cancelled--');
			$("#newitm").html(response);
			$("#newitm").show();
			
			
			
		}
	}
	);
}

function delorditm (theobject){
	var itm_ID = $(theobject).attr('id');
	var ord_ID = $(theobject).attr('data-ordid');
	//alert (ord_ID + " - " + itm_ID);
	
	$.ajax({
		url: "delitm.php",
		type: "post",
		data: {ord_ID:ord_ID,itm_ID:itm_ID},
		success:function(response){
			$("#tr_" + itm_ID).hide();
			//alert (response);
			
		}


	});
}
</script>