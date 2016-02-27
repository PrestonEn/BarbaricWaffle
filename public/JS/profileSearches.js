function edit(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";
		button.innerHTML = "cancel";

	document.getElementById('buttonHolder').innerHTML = "<button type = 'submit' class = 'btn btn-primary' style = 'right: 5em; down: 14em;' onClick='removeElements()'> delete </button>";
	document.getElementById('title').innerHTML = "<label style= 'color:red;margin-right:0.5em;margin-left:1px;' value>Remove</label>";

	var headers = document.getElementsByClassName("name");
	for (var i = headers.length - 1; i >= 0; i--) {
	 	var text = headers[i].innerHTML;
		headers[i].innerHTML = "<label style = 'color:red;margin-right:0.5em;margin-left:1px; padding:0.1em; font-size:0.2vw;'><input type=checkbox value = '"+text+"''></labeL>" + text;
	};

	}
	else {
		button.value = "0";
		button.style.backgroundColor = "grey";
		button.innerHTML = "edit";

	var headers = document.getElementsByClassName("name");
	for (var i = headers.length - 1; i >= 0; i--) {
		var text = headers[i].innerHTML;
		headers[i].innerHTML = headers[i].getElementsByTagName('input')[0].value;
	}

	document.getElementById('buttonHolder').innerHTML = "";
	document.getElementById('title').innerHTML = "";

	}
	}