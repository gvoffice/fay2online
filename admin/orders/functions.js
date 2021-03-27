function vieword (ord_ID){
	
	var loadermodal = "<div class='spinner-border text-dark' role='status'><span class='sr-only'>Loading...</span>  </div>";
	$("#ord_details").html(loadermodal);
	$.ajax({
		url: "modalcontents/view_ord.php",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			$("#ord_details").html(response);
			$("#ordTitle").html("Order: " + ord_ID);
		}
	}
	);
}

