function makeEditable(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";

	var headers = document.getElementsByTagName("th");
	for (var i = headers.length - 1; i >= 0; i--) {
		var text = headers[i].innerHTML;
		headers[i].innerHTML = text + "<a href='#' value = '"+text+"' class ='listEdit' style = 'position:absolute;right:7%;'>Remove</a>";
	}

	}
	else {
		button.value = "0";
		button.style.backgroundColor = "grey";

	var labels = document.getElementsByClassName("listEdit");
		for (var i = labels.length - 1; i >= 0; i--) {
			labels[i].innerHTML ="";
		};



	}
	}