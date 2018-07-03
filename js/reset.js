function reset(){
	var resetInfo = "";
	var email = document.getElementById("change-username").value;
    var password = document.getElementById("change-password").value;
    var password2 = document.getElementById("change-password2").value;

    if (email == null || email == "") {
        alert("Please enter the email.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }

      if (password2 == null || password2 == "") {
        alert("Please enter the password.");
        return false;
    }

    resetInfo = email + " " + password + " " + password2 ;

    $.ajax({
		url: "process/processForgot.php",
		type: "post",
		data: {reset: resetInfo},
		success: function (response) {

			if(response == "success") {
				window.location.replace("home.php");
			} else if(response == "fail") {
				alert('Login failed');
			}	
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}