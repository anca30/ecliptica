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

function searchInTable() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("productsTable");
    var tr = table.getElementsByTagName("tr");
    
    for (var i = 0; i < tr.length; i++) {
        var tdName = tr[i].getElementsByTagName("td")[0];
        var tdBrand = tr[i].getElementsByTagName("td")[1];
        if (tdName && tdBrand) {
            var productNameElem = tdName.getElementsByTagName("a")[0];
            
            if (productNameElem) {
                var productName = productNameElem.innerText;
                var productBrand = tdBrand.innerText;

                if (productName.toUpperCase().indexOf(filter) > -1 || productBrand.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }       
    }
}

function getProductsTable() {
    $.ajax({
        url: "process/processList.php",
        type: "post",
        data: {getProducts: "getProducts"},
        success: function (response) {
            if(response) {
                document.getElementById("productsTable").innerHTML = response;
                document.getElementById("tableLoader").style.display = "none"; 
            }   
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });   
}