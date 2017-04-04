$(document).ready(function() {
	//alert("hello");
	
	
	var idval = 0;
	var $pswdval = 0;
	var $cpswdval = 0;
	var $fnameval = 0;
	var $lnameval = 0;
	var emailval = 0;
	var $pnoval = 0;
	
	submit_check();

	$("<span id=\"idspan\">Enter username</span>").insertAfter("#user_id");
	$("#idspan").hide();
	
	$("<span id=\"pswdspan\">Enter password</span>").insertAfter("#pswd");
	$("#pswdspan").hide();

	$("<span id=\"cpswdspan\">Enter password</span>").insertAfter("#cpswd");
	$("#cpswdspan").hide();

	$("<span id=\"fnamespan\"></span>").insertAfter("#fname");
	$("#fnamespan").hide();

	$("<span id=\"lnamespan\"></span>").insertAfter("#lname");
	$("#lnamespan").hide();

	$("<span id=\"emailspan\">Enter your email</span>").insertAfter("#email");
	$("#emailspan").hide();
	
	$("<span id=\"pnospan\"></span>").insertAfter("#pno");
	$("#pnospan").hide();

	
	$("#user_id").focus( function(){
		$("#idspan").show();
		$("#idspan").html(" The username field must be unique");

	});

	

	$("#user_id").blur( function(){
	$("#idspan").html("Entering...");
	var user_id=$("#user_id").val();
		$.ajax({
		 url: "validate_user.php",
		 type: "post",
		 data: { "userid": user_id , "type":"username"},
		 success: function(response) {
			//alert(response);
		    if(response == "ok"){
				$("#idspan").html(""); 
				idval = 1;
				submit_check();
	 		}
			else {
				$("#idspan").html("This User Name already exists, please choose another");
				idval = 0;
				submit_check();
			}
		 },
		 error: function() 
		 { 
			alert("fail");
			idval = 0;  
			submit_check();
		}
     });
});
	
	$("#pswd").focus( function(){
		$("#pswdspan").show();
		$("#pswdspan").html("Password should be minimum 8 characters long and contain atleast one capital letter, one small letter and one digit");   
	});

	$("#pswd").blur( function(){
	var pswd=$("#pswd").val();

	if(pswd.length==0)
	{
		$("#pswdspan").hide();
		$pswdval = 0;
	}

	else if(pswd.search(/[A-Z]/)!=-1 && pswd.search(/[a-z]/)!=-1 && pswd.search(/[0-9]/)!=-1 && pswd.length>8)
	{
		$("#pswdspan").html("Ok");
		$pswdval = 1;

	}
	else
	{
		$("#pswdspan").html("Password is not strong enough..!! Password should be minimum 8 characters long and contain atleast one capital letter, one small letter and one digit ");
		$pswdval = 0;

	}
	submit_check();
	});



	$("#cpswd").focus( function(){
	$("#cpswdspan").show();
	$("#cpswdspan").html(" This password should match the above password");   
	});


	$("#cpswd").blur( function(){
	var pswd=$("#pswd").val();
	var cpswd=$("#cpswd").val();

	if(pswd.length==0 && cpswd.length==0)
	{
		$("#cpswdspan").hide();
		$cpswdval = 0;

	}
	
	if(pswd === cpswd && cpswd.search(/[A-Z]/)!=-1 && cpswd.search(/[a-z]/)!=-1 && cpswd.search(/[0-9]/)!=-1 && cpswd.length>8)
	{
		$("#cpswdspan").html("Ok");  
		$cpswdval = 1;
	}

	else
	{
		$("#cpswdspan").html("Passwords doesn't match or not strong");		
		$cpswdval = 0;

	}
	submit_check();
	});

	$("#fname").focus( function(){
		$("#fnamespan").show(); 
		$("#fnamespan").html("Enter First name");   
	});

	$("#fname").blur( function(){
	
	var fname=$("#fname").val();
	if(/^[a-zA-Z ]*$/.test(fname) == false)
	{
		$("#fnamespan").html("Special characters and numbers are not allowed");
		$fnameval = 0;
	}
	else
	{
		$("#fnamespan").html(""); 
		$fnameval = 1;

	}
	submit_check();
	});

	$("#lname").focus( function(){
	$("#lnamespan").show(); 
	});

	$("#lname").blur( function(){
	var lname=$("#lname").val();

	if(/^[a-zA-Z ]*$/.test(lname) == false)
	{
		$("#lnamespan").html("Special characters and numbers are not allowed");
		$lnameval = 0;

	}
	else
	{
		$("#lnamespan").html(""); 
		$lnameval = 1;

	}
	submit_check();
	});

	$("#email").blur( function(){
	$("#emailspan").show();
	var email=$("#email").val();
		$.ajax({
		 url: "validate_user.php",
		 type: "post",
		 data: { "email": email , "type": "email"},
		 success: function(response) {
			//alert(response);
		    if(response == "ok"){
				$("#emailspan").html(""); 
				emailval = 1;
				submit_check();
			}
			else {
				$("#emailspan").html("This Email is already registered, please login with your existing user name and password");
				emailval = 0;
				submit_check();
			}
		 },
		 error: function() 
		 { 
			alert("fail");
			emailval = 0;  
			submit_check();
		}
     });
});
	$("#pno").focus( function(){
	$("#pnospan").show(); 
	});

	$("#pno").blur( function(){
	var pno=$("#pno").val();

	if(/^[0-9]*$/.test(pno) == false)
	{
		$("#pnospan").html("Only numbers are allowed in Phone number");
		$pnoval = 0;
	}
	else
	{
		$("#pnospan").html(""); 
		$pnoval = 1;
	}
	submit_check();
	});

	function submit_check(){
	if(idval == 1 && $pswdval == 1 && $cpswdval == 1 && $fnameval == 1 && $lnameval == 1 && $pnoval == 1 && emailval == 1)
	{
		$("#user_submit").prop('disabled',false);
		//alert("suc");
	}
	else
	{
		$("#user_submit").prop('disabled',true);
		//alert("fail");
	}
	
	
	}
});