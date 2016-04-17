
function getMoreCheckboxes(value){
	if (value == 0){
		document.getElementById('petsAdd').style.display = "block";
		document.getElementById('pets').value = 1;
	}
	else{
		document.getElementById('petsAdd').style.display = "none";
		document.getElementById('pets').value = 0;
	}

}


function checkSubmit() {

    var alert = "*Required"

    if (document.getElementById('title') == '' || document.getElementById('title') == null) {
        document.getElementById('titleAlert').innerHTML = alert;
    }

}

// function postListing(e) {
//     e.preventDefault();
//     geocodeAddress();
//     //jquery form submit
// }

// function geocodeAddress() {
//     var geocoder = new google.maps.Geocoder();
//     var address = 
//         document.getElementById('address_id').value + " " +
//         document.getElementById('city_id').value +  " " + 
//         document.getElementById('country_id').value ;
//     geocoder.geocode({
//         'address': address
//     }, function (results, status) {
//         if (status === google.maps.GeocoderStatus.OK) {
//             document.getElementById('latitude_id').value = parseFloat(results[0].geometry.location.lat()).toFixed(7);
//             document.getElementById('longitude_id').value = parseFloat(results[0].geometry.location.lng()).toFixed(7);
//             document.getElementById('addListingsForm').submit();
//         } else {
//             //alert('Error: The Address is not valid! please check that the Address, along with Country and City are correct and spelt correctly.');
//             //alert('Geocode was not successful for the following reason: ' + status);
//             document.getElementById('addListingsForm').submit();
//         }
//     });
// }