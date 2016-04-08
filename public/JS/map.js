var map;
var geocoder;
var markers = new Array();
var j = 0;
var markersInBound = new Array();
var prices = new Array();
var titles = new Array();
var infowindow;

function initMap(arr, ids, price, title) {
    var coords;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            success(position, arr, ids);
        });


    } else {
        error('Geo Location is not supported');
        coords = {
            lat: 43.1,
            lng: -79.3
        };
        setMap(arr, ids, coords);
    }
    prices = price;
    titles = title;
    

}


function setMap(arr, ids, position) {

    var mapDiv = document.getElementById("col1");
    map = new google.maps.Map(mapDiv, {
        center: position,
        zoom: 14
    });

    infowindow= new google.maps.InfoWindow({
        content: ''
    });
    


    var geocoder = new google.maps.Geocoder();
    for (var i = arr.length - 1; i >= 0; i--) {
        getCoor(arr[i], map, geocoder, ids[i], prices[i], titles[i]);

    };

    var timeout;
    map.addListener('bounds_changed', function () {
        // 3 seconds after the center of the map has changed, pan back to the
        // marker.

        window.clearTimeout(timeout);

        timeout = window.setTimeout(function () {
            //do stuff on event
            //alert("stopped");
            boundChangedEvent();
        }, 500);
    });



}

function boundChangedEvent() {

    var bounds = map.getBounds();
    markersInBound.length = 0;
    //alert(markers[0].get('id'));

    for (var i = 0; i < markers.length; i++) {
        if (bounds.contains(markers[i].getPosition())) {
            // code for showing your object
            markersInBound[i] = markers[i].get('id');
            //console.log(markersInBound[i].id);
            // alert(markersInBound[i]);
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });


    $.ajax({
        type: "POST",
        url: "/updateSidebar",
        data: {
            'id': markersInBound
        },
        success: function (data) {

            $("#col2").html(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });

}


function getCoor(address, map, geocoder, ids, price, title) {

    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                title: address,
                icon: "../images/houseIcon.jpeg",
            });

            marker.setValues({
                type: "point",
                id: ids
            });
            markers[j] = marker;
            j++;
            /*
            google.maps.event.addListener(marker, 'click', function (num) {
                window.location.href = "houseTemplate/" + ids;
            });
            */
            
            //htmlString = content of the infowindow - add information here
            var htmlString = "<p>"+ price+"</p>"+"<p>"+ title+"</p>";
                    
            makeInfoWindow(marker, map, infowindow, htmlString);

        } else {
            //alert('Cannot compute Coordinates : ' + status);
        };
    });
}

function makeInfoWindow(marker, map, infowindow, htmlString) {
    google.maps.event.addListener(marker, 'mouseover', function () {
        infowindow.setContent(htmlString);
        infowindow.open(map, marker);
    });
   
}


function success(position, arr, ids) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    setMap(arr, ids, coords);
}