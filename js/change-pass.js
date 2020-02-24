		$(document).ready(function() {
		//send info to change_pass.php to check
		$("#changebtn").click(function() { 	
			if(checkform()){
				var formDATA = {
					'oldpass': $('#oldpass').val(),
					'newpass': $('#newpass').val(),
					'newpass': $('#newpass').val()
				}
				$.ajax({    
					type: "POST",
					url: "../change_pass.php",             
					data: formDATA,               
					success: function(response){   
						$('.password').val('');                
						$("#response").html(response); 
						
					}
				});
			}
		});
	});

		function checkPassword(str)
		{
    // at least one number, one lowercase and one uppercase letter
    // at least 8 characters that are letters, numbers or the underscore
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    return re.test(str);
}

function checkform()
{
	//check if there is an empty input
	if($('#oldpass').val() == '' || $('#newpass').val()=='' || $('#newpass2').val()== ''){
		document.getElementById("response").innerHTML = "Please fill all inputs";
		return false;
	}
	//check if confirm pass is the same as new pass
	if($('#newpass').val() == $('#newpass2').val() ) {
		//check if new pass is the same as old pass
		if($('#oldpass').val()  == $('#newpass').val()){
			document.getElementById("response").innerHTML = "You can't change to the same password!";
			return false;
		}
		//check if new pass is valid
		if(!checkPassword($('#newpass').val())) {
			document.getElementById("response").innerHTML = "Password must contain at least 8 characters with one number, one lowercase and one uppercase letter";
			return false;
		}
	} else {
		document.getElementById("response").innerHTML = "Passwords not matched!";
		return false;
	}
	return true;
}