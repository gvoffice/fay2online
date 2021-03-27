<?PHP 
include('../../../common/dbconnect.php');
$ord_ID = $_POST['ord_ID']; 
$action = $_POST['action'];	

if ($action == 'showcat'){

echo"
<div class='alert alert-info'>
<label for='itm_cat'>Category</label>
	<select id='$ord_ID-cat' onchange='add_itm_name(this.id,this.value)'>";
		
		
		$sql = "Select * from category";
		$result = $conn->query($sql);
		echo "<option value='0'>Select One</option>";
		while ($row = $result->fetch_assoc()){
			echo "<option>".strtoupper($row['cat_name'])."</option>";
		}
		
		
echo "
	</select>
</div>
<div id='ItmNameSelect'></div>

";
	
//<button id='$ord_ID' cat='' class='btn btn-block btn-info btn-sm' onchange='add_itm_name(this.id,cat_$ord_ID.value)'>Next</button>";
}
//========================================================================================

if ($action=='showname'){
	
	echo"



	<div class='alert alert-info'>
<label for='$ord_ID-name' id='2'>Item Name</label>
	<select id='$ord_ID-name' onchange='add_itm_desc(this.id,$ord_ID-name.value,this.value)'>";
		
		echo "<option value='0'>Select One</option>";
		$sql = "Select * from product where LOWER(itm_category) = '".strtolower($_POST['itm_cat'])."'";
		$result = $conn->query($sql);
		
		while ($row = $result->fetch_assoc()){
			
			echo "<option>".strtoupper($row['itm_name'])."</option>";	
			
		}
		
		
echo "
	</select>  
</div>
<div id='ItmDescSelect'></div>
";	
	
	
}

//=======================================================================================================================================================================================================================================================

if ($action=='desc'){
	
	echo "
<div class='alert alert-info'>
<label for='itm_desc'>Item Details </label>
	<select id='save$ord_ID'";
		
		echo "<option value='0'>Select One</option>";
		$sql = "Select * from product where LOWER(itm_name) = '".strtolower($_POST['itm_name'])."'";
		$result = $conn->query($sql);
		
		while ($row = $result->fetch_assoc()){
			
			echo "<option value='".($row['itm_ID'])."'>".strtoupper($row['itm_desc'])."</option>";	
			
		}
		
		
echo "
	</select>  
	
</div>
<div class='alert alert-info'>
<label for='qty'>Quantity</label>
<input type='number' id='qty' value='1'>
</div>

<button id='$ord_ID' type='button' class='btn btn-block btn-success' onclick='add_itm_save(this.id,save$ord_ID.value,qty.value,)'>ADD</button>
";		
	
	
}

//======================================================================================================================================================================================================================================================

if ($action=='save'){
	$itm_ID = $_POST['itm_ID'];
	$qty = $_POST['qty'];
	$sql = "Select * from product where itm_ID = $itm_ID";
	
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();
	
	$tot_price = $_POST['qty'] * $row['itm_price'];
	
	$sql = "Insert into ordered_itms (ord_ID,itm_ID,qty,price) values (
	'$ord_ID',
	'$itm_ID',
	'$qty',
	'$tot_price'
	)";
	$conn->query($sql);

	echo "success";

}


	?>

<script type="text/javascript">
function add_itm_name(taken_ord_ID, itm_cat) {
    var str = taken_ord_ID;
    var splitted = str.split('-');
    var ord_ID = splitted[0];



    $.ajax({
        url: "newitem/add_new.php",
        type: 'post',
        data: {
            ord_ID: ord_ID,
            itm_cat: itm_cat,
            action: 'showname'
        },
        success: function(response) {

            $("#ItmNameSelect").html(response);
            $("#ItmNameSelect").show();


        }
    });
}

function add_itm_desc(taken_ord_ID, itm_cat, itm_name) {
    var str = taken_ord_ID;
    var splitted = str.split('-');
    var ord_ID = splitted[0];
    var action = splitted[1];
    itm_cat = $("#" + ord_ID + "-name").val();
    //alert ("ataken_ord_ID: " + taken_ord_ID + " - itm_cat: " + itm_cat  + " - itm_name: " + itm_name + " - ord_ID: " + ord_ID + " - action: " + action);

    $.ajax({
        url: "newitem/add_new.php",
        type: 'post',
        data: {
            ord_ID: ord_ID,
            itm_cat: itm_cat,
            itm_name: itm_name,
            action: "desc"
        },
        success: function(response) {

            $("#ItmDescSelect").html(response);

        }
    });
}

function add_itm_save(ord_ID, itm_ID, qty) {
    //alert("ord_ID: " + ord_ID);
    //alert("itm_ID: " + itm_ID);
    //alert("qty: " + qty);

    $.ajax({
        url: "newitem/add_new.php",
        type: 'post',
        data: {
            ord_ID: ord_ID,
            action: "save",
            itm_ID: itm_ID,
            qty: qty
        },
        success: function(response) {
            //alert (response);
            if (qty == "" || qty == "0") {
                alert("Quantity must be more than 0");

                //$("#newitm").html(response);
            } else {

                $("#newitm").hide();

                orderedItms(ord_ID);

            }
        }
    });
}
</script>

<?PHP 
	$conn->close(); 
?>