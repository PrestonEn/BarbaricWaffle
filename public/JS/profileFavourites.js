function makeEditable(button){
	if (button.value == "0"){
		button.value = "1";
		button.style.backgroundColor = "orange";
		button.innerHTML = "cancel";
		if (document.getElementById('warning')!= null){
			document.getElementById('warning').innerHTML = '*** Note that deleting a property will delete all listings at that property ***';
		}


	var headers = document.getElementsByClassName("removeable");

	for (var i = headers.length - 1; i >= 0; i--) {
		var id = headers[i].getAttribute("name");
		var text = headers[i].innerHTML;
		headers[i].innerHTML = text + " " + "<label style = 'color:red'> remove <input type=checkbox class = 'rmChecks' name = '"+id+"' value = '"+text+"''></labeL>";
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
	if (document.getElementById('warning')!= null){
			document.getElementById('warning').innerHTML = '';
		}
	}
	}


	function removeElements(){
		var contin = true;
		var toDelete = [];
		var index = 0;

		var id = document.getElementsByTagName('input');
		for (var i = id.length - 1; i >= 0; i--) {
			if (id[i].checked){
				toDelete[index] = id[i].getAttribute("name");
				index = index+1;
			}
		};

		if (index > 0){
			if (document.getElementById('warning') != null){
				contin = window.confirm("Be aware that deleting a property will also delete all associated listings.");
			}


			if (contin == true){
				document.getElementById('array').value = JSON.stringify(toDelete);
				document.forms["formyform"].submit();
			}
		}

		/*
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
*/

	}