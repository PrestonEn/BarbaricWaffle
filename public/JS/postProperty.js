function checkSubmit() {

    var alert = "*Required"

    if (document.getElementById('title') == '' || document.getElementById('title') == null) {
        document.getElementById('titleAlert').innerHTML = alert;
    }

}

function postProperty(e) {
    e.preventDefault();
    geocodeAddress();
    //jquery form submit
}

function geocodeAddress() {
    var geocoder = new google.maps.Geocoder();
    var address = 
        document.getElementById('address_id').value + " " +
        document.getElementById('postalCode_id').value;
    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            document.getElementById('maps_json_id').value = JSON.stringify(results);
            document.getElementById('addPropertyForm').submit();
        } else {
            alert('Geocode was not successful for the following reason: ' + status );
        }
    });
}