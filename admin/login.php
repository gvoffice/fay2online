<?PHP if (isset($_COOKIE["uname"])) {
	session_start();
	$_SESSION["uname"] = $_COOKIE["uname"];
	header("location: dashboard.php");
}

?>

<!doctype html>
<html>
<head>

	<link rel="stylesheet" href="../common/login.css">
	<?PHP include('../common/header.html'); ?>
<title>Log In</title>
</head>

<body>
<div class="container">
	<div id="message" class="alert alert-danger" style="position: absolute;top: 5px;width: 100%"></div>
	<div id="loginform">
	
		<center><img src="../images/logoleaf.jpg" class="logofay">
        
		 <script type="text/javascript">
			 $("#message").hide();
		 </script>
		 
        <div>
            <input class="form-control m-1" type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
        </div>
        <div>
            <input class="form-control m-1" type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
        </div>
        <div>
            <input class="btn btn-block m-1 btn-light" type="button" value="Submit" name="but_submit" id="but_submit" />
        </div>
	</center>
	</div>
	
	</div>	

	
	
	
	<script type="text/javascript">
	$(document).ready(function(){
    $("#but_submit").click(function(){
        var usr_name = $("#txt_uname").val().trim();
        var usr_pwd = $("#txt_pwd").val().trim();

        if( usr_name != "" && usr_pwd != "" ){
            $.ajax({
                url:'usrchk.php',
                type:'post',
                data:{usr_name:usr_name,usr_pwd:usr_pwd},
                success:function(response){
                    var msg = "";
                    if(response == 1){
						$("#message").attr("class","alert alert-success");
						$("#message").show().delay(1500).fadeOut();
						$("#message").html("Login Successful! Redirecting to your dashboard!");
                        window.location = "dashboard.php";
						msg = response;
                    }else{
						
                       // msg = "Username or Password Invalid! Please try again.";
                        msg = "Username or Password" + response;
						 $("#message").html(msg);
						//$("#message").show().delay(1500).fadeOut();
                    }
                   
					
                }
            });
        }
    });
});
	</script>
</body>
</html>

