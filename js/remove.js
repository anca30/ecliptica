

function remove() {
	var isAnyChecked = false;
    var checkBoxes = document.getElementsByName("bifat");

	for(var i = 0; i < checkBoxes.length; i++) {
		if(checkBoxes[i].checked) {
			isAnyChecked = true;
			break;
		}
	}    

    if (isAnyChecked != true){
    
    	var modal2 = document.getElementById('removeModal');
		var span = document.getElementById("confirm");

		modal2.style.display = "block";

		span.onclick = function() {
			modal2.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal2) {
				modal2.style.display = "none";
			}
		}
	}
	else{
		var modal3 = document.getElementById('confirmRemoveModal');
		var span = document.getElementById("confirmRemove");

		modal3.style.display = "block";

		span.onclick = function() {
			modal3.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal3) {
				modal3.style.display = "none";
			}
		}
	}
}

function closeRemoveModal() {
	var close = document.getElementById('confirm');
	modal2.style.display = "none";
}

function confirmRemove() {
	var close = document.getElementById('confirmRemove');
	var modal3 = document.getElementById('confirmRemoveModal');
	modal3.style.display = "none";
	products = [];
	
	var elements = document.getElementsByName("bifat");
	
	for(var i = 0; i < elements.length; i++) {
		if(elements[i].checked) {
			products[i] = elements[i].id;
		}
	}
	$.ajax({
			url: "process/remove.php",
			type: "post",
			data: {products:products},
			success: function (response) {
				if(response.includes("success")) {
					//alert('success');
					location.reload();
				} else if(response == "fail") {
					alert('failed');
				}
				else //alert(response);
				location.reload();
				
				/*if(!response.includes("logat")){
					window.open("completeOrder.php");
				}*/
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		}); 
}