
function saveUrl() {
	var url = document.getElementById("txt").value;
	var modal = document.getElementById('myModal');

	if(url != '') {
		$.ajax({
			url: "process/processURL.php",
			type: "post",
			data: {url: url},
			success: function (response) {
				if(response.includes("success")) {
					//alert('success');
					location.reload();
					// Inchide modalul
					modal.style.display = "none";
				} else if(response == "fail") {
					alert('failed');
				}
				else //alert(response);	
				location.reload();

			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});      
	}
}

function closeUrlModal() {
	var close = document.getElementById('close');
	modal.style.display = "none";
}

function closeShareModal() {
	var shareModal = document.getElementById("shareModal");
	var emailInupt = document.getElementById("email");
	var err1 = document.getElementById("addPeopleErrNoEmail");
	var err2 = document.getElementById("addPeopleErrMatch");

	shareModal.style.display = "none";
	emailInupt.value = '';
	err1.style.display = "none";
	err2.style.display = "none";
}

function helpClose() {
	var helpClose = document.getElementById('helpClose');
	modal4.style.display = "none";
}

function printPage() {
    window.print();
}

function share() {
	var shareModal = document.getElementById("shareModal");
	var emailInupt = document.getElementById("email");
	var emailList = emailInupt.value;
	var emailListRegex = new RegExp("([a-zA-Z0-9_\.]+@[a-zA-Z0-9_]+\.[a-z]+)\s*");

	if (emailList == '') {
		var err = document.getElementById("addPeopleErrNoEmail");
		err.style.display = "block";
	} else if (!emailListRegex.test(emailList)) {
		var err = document.getElementById("addPeopleErrMatch");
		err.style.display = "block";
	} else {
		$.ajax({
			url: "process/share.php",
			type: "post",
			data: {emailList: emailList},
			success: function (response) {
				if(response.includes("success")) {
					//alert('success');
					// Inchide modalul
					shareModal.style.display = "none";
				} else if(response == "fail") {
					shareModal.style.display = "none";
					alert('Sharing this list has failed. Please try again!');
				} else {
					alert(response);
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Sharing this list has failed. Please try again!');
				shareModal.style.display = "none";
				console.log(textStatus, errorThrown);
			}
		});  
	}
}