<?PHP 

$ord_ID = $_POST['ord_ID']; 
$itm_cat = $_POST['itm_cat'];	

include('../../../common/dbconnect.php');
echo" 

<div class='alert alert-info'> 
<label for='itm_cat'>Category:  <strong>$itm_cat</strong></label>
	<select id='name_$ord_ID'>";
		
		
		$sql = "Select * from product where itm_cat = '$itm_cat'";
		$result = $conn->query($sql);

		while ($row = $result->fetch_assoc()){
			echo "<option>".strtoupper($row['itm_cat'])."</option>";
		}
		$conn->close();
		
echo "<span id="secret"></span>
	</select>
</div>
<button id='$ord_ID' cat='' class='btn btn-block btn-info btn-sm' onClick='add_itm_name(this.id,name_$ord_ID.value)'>Next</button>";
	
	?>

<script>
function add_itm_name(ord_ID,itm_name){
	
	$.ajax({
		url: "newitem/add_new_name.php",
		type: 'post',
		data: {ord_ID:ord_ID,Field:'name'},
		success:function(response){
			//alert ('the response is (' + response + ')');
			//$('#ord_' + ord_ID).attr('class','bg-danger');
			//alert ('Order ('+ ord_ID +') is Marked as --Cancelled--');
			$("#newitm").html(response);
			//$("#newitm").show();
			
			
			
		}
	}
	);
}
</script>