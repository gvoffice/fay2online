// JavaScript Document
$(document).ready(function(){
	
	//start up settings
	$("#orders-side-menu").hide();
	$("#reports-side-menu").hide();
	$("#sideNav").toggleClass("hideSideMenu");	
	
	//=================================================================================
	//other functions--------------------------------------------------
	
	//order button
    $("#orders").click(function(){
      
		$("#orders-side-menu").slideToggle();
	});	
    //products button
    $("#reports").click(function(){
      
		$("#reports-side-menu").slideToggle();
	});	
	//menu toggler button
    $("#side-toggler").click(function(){
      
		$("#sideNav").toggleClass("hideSideMenu", 1000, "slide");
		
	});	
    
    
});
						// $("#message").attr("class","alert alert-success");
						//$("#message").attr("class","alert alert-success");
						//$("#message").show().delay(1500).fadeOut();
						//$("#message").html("Login Successful! Redirecting to your dashboard!");
                        // window.location = "dashboard.php";
						//msg = response;

// Orders card 
/*$.ajax({
                url:'cards/todayorders.php',
                type:'post',
                
                success:function(response){
                    var msg = response;
                   
						
						$("#cardOrders_text").html(msg);
                        
                   
					
                }
            });   */
/*
// Sales Card
$.ajax({
                url:'cards/todaysales.php',
                type:'post',
                
                success:function(response){
                    var msg = response;
                   
						
						$("#cardSales_text").html(msg);
                        
                   
					
                }
            });
// Customers Card
$.ajax({
                url:'cards/totalcustomers.php',
                type:'post',
                
                success:function(response){
                    var msg = response;
                   
						
						$("#cardCustomers_text").html(msg);
                        
                   
					
                }
            }); */
