function copyord (ord_ID){
	
	$.ajax({
		url: "modalcontents/copy_ord.php",
		type: 'post',
		data: {ord_ID:ord_ID},
		success:function(response){
			$("#ord_details").html(response);
		}
	}
	);
}