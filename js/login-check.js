	$(document).ready(function() {
		//send info to login.php to check
		$("#loginbtn").click(function() { 
			//check if remember me checkBox is checked or not
		if ($('#remember').is(":checked"))
			$('#remember').val('1');
             
				var formDATA = {
					'username': $('#username').val(),
					'password': $('#password').val(),
					'remember': $('#remember').val()
			}

      $.ajax({    
      	type: "POST",
      	url: "../login.php",             
        data: formDATA,               
        success: function(response){                  
        $("#response").html(response);         
    }
});
  
  });
	});
	//check if cookies is enabled in browser
function toggleCheckbox(element)
 {
 	// when remmeber me enabled
   if(element.checked == true){
   	// check if cookies enabled
   	var cookieEnabled=(navigator.cookieEnabled)? true : false
 
//if not IE4+ nor NS6+
if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){ 
    document.cookie="testcookie"
    cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false
}
 //if cookies are enabled on client's browser
if (!cookieEnabled){
	alert("Please enable cookies to activate this feature");
	element.checked = false;

} 
   }
 }