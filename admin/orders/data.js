// JavaScript Document



	
	$(document).ready(function(){  //document loaded
		
		
	
    $("#apply_fltr").click(function(){  // on button filter click	
       
		
		var r_status = $("#r_status").val();
        var r_p_p = $("#r_p_p").val();
        var r_o_by = $("#r_o_by").val();
		var r_from_date = $("#from_date").val();
		var r_to_date = $("#to_date").val();
				$.ajax({
                url:'all.php',
                type:'post',
                data:{r_status:r_status,r_p_p:r_p_p,r_o_by:r_o_by,r_to_date:r_to_date,r_from_date:r_from_date},
                success:function(response){
				$("#dataTable").html(response);
                }
            });
		
        
    });
	//==============================================================================================

		
});



