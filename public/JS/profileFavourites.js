function makeEditable(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";
		button.innerHTML = "cancel";

	var headers = document.getElementsByClassName("removeable");

	for (var i = headers.length - 1; i >= 0; i--) {
		var id = headers[i].getAttribute("name");
		var text = headers[i].innerHTML;
		headers[i].innerHTML = text + " " + "<label style = 'position:absolute;right:2.5em; color:red'> remove <input type=checkbox class = 'rmChecks' name = '"+id+"' value = '"+text+"''></labeL>";
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

		var id = [];

		var url = location.href;
		var url = url.split('/');
		var userId = url[url.length-1];
		var toRemove = document.getElementsByClassName('rmChecks');

		for (var i = toRemove.length - 1; i >= 0; i--) {
			if (toRemove[i].checked){
				id.push(toRemove[i].getAttribute('name'));
			}
		}

		$.ajax({
        	method: post,
        	url: '/link-tracking',
        	data: {
           	href: link   
      	}
    });

	}