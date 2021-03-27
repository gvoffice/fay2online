<script>
	function DataReload(r_start,r_offset,pageno){	
	
	var r_status = $('#r_status').val();
	var r_p_p = $('#r_p_p').val();
	var r_o_by = $('#r_o_by').val();
	var r_from_date = $("#from_date").val();
	var r_to_date = $("#to_date").val();
	var pnum = pageno.substr(4);
	$("#pnum" + pnum).html("<div class='spinner-grow spinner-grow-sm' role='status'><span class='sr-only'>Loading...</span></div>");		
			$.ajax({
			url: 'reload.php',
			type: 'post',
			data: {r_status:r_status,r_p_p:r_p_p,r_o_by:r_o_by,r_start:r_start,r_offset:r_offset,r_to_date:r_to_date,r_from_date:r_from_date},
			success:function(response){
			
			$("#dataTable").html(response);
			$("pnum" + pnum).html(pnum);
			
							}
			});//end of ajax
		}//end function
	
	function copyord (ord_ID){
	
	$.ajax({
		url: "modalcontents/copy_ord.php",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			$("#ord_details").html(response);
			$("#ordTitle").html("Order: " + ord_ID);
			
		}
	}
	);
}
		
	function markpending(ord_ID){
	
	$.ajax({
		url: "statusjs/pending.php?action=pending",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			//alert ('the response is (' + response + ')');
			$('#ord_' + ord_ID).attr('style','background-color:rgba(235,220,50,0.5);');
			$('#status' + ord_ID).html('Pending');
		}
	}
	);
}
		
	function markprocessed(ord_ID){
	
	$.ajax({
		url: "statusjs/pending.php?action=processed",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			//alert ('the response is (' + response + ')');
			$('#ord_' + ord_ID).attr('style','background-color:rgba(50,50,235,0.5);');
			$('#status' + ord_ID).html('Processed');
		}
	}
	);
}
		
	function markdelivered(ord_ID){
	
	$.ajax({
		url: "statusjs/pending.php?action=delivered",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			//alert ('the response is (' + response + ')');
			$('#ord_' + ord_ID).attr('style','background-color:rgba(50,235,50,0.5);');
			$('#status' + ord_ID).html('Delivered');
		}
	}
	);
}
		
	function cancelord(ord_ID){
	
	$.ajax({
		url: "statusjs/pending.php?action=cancelled",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			//alert ('the response is (' + response + ')');
			$('#ord_' + ord_ID).attr('style','background-color:rgba(235,50,50,0.5);');
			alert ('Order ('+ ord_ID +') is Marked as --Cancelled--');
			$('#status' + ord_ID).html('Cancelled');
			$('#ordModal').hide();
			$( ".modal-backdrop" ).hide();
		}
	}
	);
}
		
	function editord(ord_ID){
	
	$.ajax({
		url: "editord.php",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			
			$("#ord_details").html(response);
			$("#edititmsord").hide();
			$("#savesuccess").hide();
			
			
		}
	}
	);
}
	function orderedItms(ord_ID){
	
	$.ajax({
		url: "edit_ord_items.php",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			//alert ('the response is (' + response + ')');
			//$('#ord_' + ord_ID).attr('class','bg-danger');
			//alert ('Order ('+ ord_ID +') is Marked as --Cancelled--');
			$("#edititmsord").html(response);
			$("#edititmsord").show();
			
			
			
		}
	}
	);
}
	
	
		
		</script>
