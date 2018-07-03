function remove() {
    var checkBox = document.getElementById("bifat");
    if (checkBox.checked == true){
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