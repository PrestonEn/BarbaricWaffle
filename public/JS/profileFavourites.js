function makeEditable(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";
		button.innerHTML = "cancel";

	var headers = document.getElementsByClassName("removeable");
	for (var i = headers.length - 1; i >= 0; i--) {
		var text = headers[i].innerHTML;
		headers[i].innerHTML = text + "<label style = 'position:absolute;right:2.5em; color:red'> remove <input type=checkbox value = '"+text+"''></labeL>";
	}

	document.getElementById('buttonHolder').innerHTML = "<button type = 'submit' class = 'btn btn-primary' style = 'right: 7em; down: 14em;' onClick='removeElements()'> delete </button>";

	}
	else {
		button.value = "0";
		button.style.backgroundColor = "grey";
		button.innerHTML = "edit";

	var headers = document.getElementsByClassName("removeable");
	for (var i = headers.length - 1; i >= 0; i--) {
		var text = headers[i].innerHTML;
		headers[i].innerHTML = headers[i].getElementsByTagName('input')[0].value;
	}

	document.getElementById('buttonHolder').innerHTML = "";

	}
	}


	function removeElements(){
		/* Create an event handler to retrieve selected listings and use their value to remove the actual database entries. */
	}