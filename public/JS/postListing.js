
function checkSubmit(){
	
	var alert = "*Required"

	if (document.getElementById('title') == '' || document.getElementById('title') == null){
		document.getElementById('titleAlert').innerHTML = alert;
	}

}