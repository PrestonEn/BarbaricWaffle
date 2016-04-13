
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
        document.getElementById('city_id').value + " " +
        document.getElementById('country_id').value + " " +        
        document.getElementById('postalCode_id').value;
    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var lat = parseFloat(results[0].geometry.location.lat()).toFixed(7);
            var lng = parseFloat(results[0].geometry.location.lng()).toFixed(7);
            initialize(lat, lng);
            //alert(JSON.stringify(results));
            //document.getElementById('maps_json_id').value = JSON.stringify(results);
            // document.getElementById('addPropertyForm').submit();
        } else {
            alert('Geocode was not successful for the following reason: ' + status + '\n' 
                  + 'Please update the address info and reattempt, or contact support');
        }
    });
}



function initialize(lat, lng) {
    var center = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: center
    };

    map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);

    var marker = new google.maps.Marker({
        map: map,
        position: center
    });
    $('#myModal').modal('show')
}

$('#myModal').on('shown.bs.modal', function (e) {
  var currentCenter = map.getCenter();  // Get current center before resizing
  google.maps.event.trigger(map, "resize");
  map.setCenter(currentCenter); // Re-set previous center

})
