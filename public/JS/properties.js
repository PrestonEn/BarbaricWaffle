function makeEditable(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";
		button.innerHTML = "cancel";
	var headers = document.getElementsByClassName("removeable");
	document.getElementById("remove").style.display = "block";
	for (var i = headers.length - 1; i >= 0; i--) {
		var id = headers[i].getAttribute("name");
		var text = headers[i].innerHTML;
		headers[i].innerHTML = "<label style = 'position:absolute;right:0;top:0.5em'> <input type=checkbox class = 'rmChecks' name = '"+id+"'></labeL>";
	}

	document.getElementById('buttonHolder').innerHTML = "<button type = 'submit' class = 'btn btn-primary' style = 'right: 7em; down: 14em;' onClick='removeElements()'> delete </button>";

	}
	else {
		button.value = "0";
		button.style.backgroundColor = "grey";
		button.innerHTML = "edit";

	document.getElementById("remove").style.display = "none";
	var headers = document.getElementsByClassName("removeable");
	for (var i = headers.length - 1; i >= 0; i--) {
		var text = headers[i].innerHTML;
		headers[i].innerHTML = "";
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