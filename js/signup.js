			$(document).ready(function() {
		//send info to signup.php to check
		$("form").submit(function(e) {						
			e.preventDefault();
				if (checkForm($("form"))) {				
				var formDATA = $("form").serialize();
				$.ajax({    
					type: "POST",
					url: $("form").attr('action'),             
					data: formDATA,               
					success: function(response){   
						$("#response").html(response); 
						
					}
				});
			}
			});

	});

		function checkPassword(str)
		{
    // at least 8 characters with one number, one lowercase and one uppercase letter
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    return re.test(str);
}
function checkUsername(str)
{
	//must be alphabetic with/without . and _
    var re = /^[a-zA-Z._]*$/;
    return re.test(str);
}

function checkForm(form)
{
	//check if pass and confirm pass is equal
	if($("#password1").val() == $("#password2").val()) {
		// check if username is valid 
		if(!checkUsername($("#username").val())){
			document.getElementById("response").innerHTML = "Username not valid!";
			$("#username").focus();
			return false;
		}
		// check if password is valid 
		if(!checkPassword($("#password1").val())) {
			document.getElementById("response").innerHTML = "Password must contain at least 8 characters with one number, one lowercase and one uppercase letter";
			$("#password1").focus();
			return false;
		}
	} else {
		document.getElementById("response").innerHTML = "Passwords not matched!";
		$("#password1").focus();
		return false;
	}

	return true;
}