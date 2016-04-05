

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
            
            
            $("#longitude").val(results[0].geometry.location.lng());
            $("#latitude").val(results[0].geometry.location.lat());
            //alert($("#latitude").val());
             //$("#ListingsForm").submit();
            
           // updateDatabase(results[0].geometry.location.lat(), results[0].geometry.location.lng());
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function updateDatabase(newLat, newLng) {

    
    // make an ajax request to a PHP file
    // on our site that will update the database
    // pass in our lat/lng as parameters
    /*
      $.ajax({
        type: "POST",
        url: "/addListing",
        data: {'_token': $('input[name=_token]').val(), $("#ListingsForm").serialize()},
        success: function() {
            alert("Geodata sent");
        }
    })
    */
   
    //document.forms["ListingsForm"].submit();
}