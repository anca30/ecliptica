
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
					alert('success');
					// Inchide modalul
					modal.style.display = "none";
				} else if(response == "fail") {
					alert('failed');
				}
				else alert(response);	
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
