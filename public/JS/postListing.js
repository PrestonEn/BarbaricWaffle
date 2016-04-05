

function checkSubmit() {

    var alert = "*Required"

    if (document.getElementById('title') == '' || document.getElementById('title') == null) {
        document.getElementById('titleAlert').innerHTML = alert;
    }

}

function test(e) {
    e.preventDefault();
    geocodeAddress();


}

function geocodeAddress() {
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById('address').value;
    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            position: results[0].geometry.location
            updateDatabase(results[0].geometry.location.lat(), results[0].geometry.location.lng());
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function updateDatabase(newLat, newLng) {

    // make an ajax request to a PHP file
    // on our site that will update the database
    // pass in our lat/lng as parameters
      $.ajax({
        type: "POST",
        url: "/addLongLat",
        data: {'lat': newLat, 'long': newLng},
        success: function() {
            alert("Geodata sent");
        }
    })
}