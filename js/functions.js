function validateSignIn() {
	var loginInfo = "";
    var email = document.getElementById("login-username").value;
    var password = document.getElementById("login-password").value;
    if (email == null || email == "") {
        alert("Please enter the email.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }

    loginInfo = email + " " + password;

    $.ajax({
		url: "process/process.php",
		type: "post",
		data: {login: loginInfo},
		success: function (response) {

			if(response == "success") {
				window.location.replace("home.php");
			} else if(response == "fail") {
				alert('Login failed');
			}	
            alert(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});      
}


function validateSignUp() {
	var signUpInfo = "";
	var email = document.getElementsByName("email")[0].value;
    var firstname = document.getElementById("signup-firstname").value;
	var lastname = document.getElementById("signup-lastname").value;
    var password = document.getElementById("signup-password").value;
    var password2 = document.getElementById("signup-password2").value;
    var address = document.getElementById("signup-address").value;
    var phone = document.getElementById("signup-phone").value;
    if (email == null || email == "") {
        alert("Please enter the email.");
        return false;
    }
     if (firstname == null || firstname == "") {
        alert("Please enter the firstname.");
        return false;
    }
    if (lastname == null || lastname == "") {
        alert("Please enter the lastname.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }

    if (password2 == null || password2 == "") {
        alert("Please retype the password.");
        return false;
    }
    
    if (address == null || address == "") {
        alert("Please enter the address.");
        return false;
    }
    if (phone == null || phone == "") {
        alert("Please enter the phone number.");
        return false;
    }

   signUpInfo = email + "|"+ firstname + "|" + lastname + "|" + password + "|" + password2 + "|" + address +  "|" + phone;


    $.ajax({
		url: "process/processSignUp.php",
		type: "post",
		data: {signup: signUpInfo},
		success: function (response) {
			alert(response);
			if(response == "success") {
				alert(response);
				// alert('Register successful');
				window.location.replace("home.php");
			} else if(response == "fail") {
				alert('fail');
			}	
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});      
}
