var map;
var geocoder;
var markers = new Array();
var j = 0; // counts the total number of markers we have - used to loop through all markers to check which are in current bounds
var markersInBound = new Array();
var prices = new Array();
var titles = new Array();
var longitude = new Array();
var latitude = new Array();
var searchLocationID = new Array();
var infowindow;
var locationIDs = new Array();




//Google Maps js--------------------------------------------------------------------//

function initMap(arr, ids, price, title, long, lat) {
    var coords;
      
    prices = price;
    titles = title;
    longitude = long;
    latitude = lat;
    locationIDs = ids;
        
        coords = {
            lat: 43.1,
            lng: -79.3
        };
        setMap(arr, ids, coords);
 
}

function setMap(arr, ids, position) {

    var mapDiv = document.getElementById("col1");
    map = new google.maps.Map(mapDiv, {
        center: position,
        zoom: 14
    });

    infowindow = new google.maps.InfoWindow({
        content: ''
    });



    var geocoder = new google.maps.Geocoder();
    for (var i = ids.length - 1; i >= 0; i--) {
        getCoor(arr[i], map, geocoder, ids[i], prices[i], titles[i], longitude[i], latitude[i]);

    };

    var timeout;
    map.addListener('bounds_changed', function () {
        window.clearTimeout(timeout);

        timeout = window.setTimeout(function () {
            boundChangedEvent();
        }, 500);
    });
}

//Event which fires after the long + lat bounds have changed
function boundChangedEvent() {

    var bounds = map.getBounds();
    markersInBound.length = 0;

    for (var i = 0; i < markers.length; i++) {
       
        if (bounds.contains(markers[i].getPosition())) {
            if(markers[i].getVisible() == true){
                markersInBound[i] = markers[i].get('id');
        
            }
        }
        
    }
    //needed in laravel for ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    //ajax call to update sideBar
    $.ajax({
        type: "POST",
        url: "/updateSidebar",
        data: {
            'id': markersInBound
        },
        success: function (data) {

            $("#sideBar").html(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });

}


function getCoor(address, map, geocoder, ids, price, title, long, lat) {

    var latlng = new google.maps.LatLng(lat, long);

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: address,
        icon: "../images/houseIcon.jpeg",
    });
    
    
    marker.setValues({
        type: "point",
        id: ids,
        visible: true
    });
    markers[j] = marker;
    j++;
    
    var htmlString = "<p>" + price + "</p>" + "<p>" + title + "</p>";

    makeInfoWindow(marker, map, infowindow, htmlString);

    /*
    google.maps.event.addListener(marker, 'click', function (num) {
        window.location.href = "houseTemplate/" + ids;
    });
    */

}

//function to make the infowindow
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

//updates position on the map
function updateLatLongFromCity(cityName){

    var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'address': cityName}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()));
            } else {
            alert("Something got wrong " + status);
          }
        });
}

//function to update according to filters
function searchFilters(e){
    
    e.preventDefault();
    searchLocationID.length = 0;
    
    
     //needed in laravel for ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });
    
    var prices = slider.noUiSlider.get();
   
    
    var input = $("#searchFilter select[name='region']").val(); 
    if(input != "All"){
        updateLatLongFromCity(input);
    }
    
    var form = $('#searchFilter').serialize()+ "&minPrice=" + prices[0]+ "&maxPrice=" + prices[1];
    
    //ajax call to update sideBar
    $.ajax({
        type: "POST",
        url: "/searchFilter",
        data: form,
        success: function (data) {
           
            $.each (data, function (k, value) {
                
                $.each(value, function(key, val){
                    searchLocationID.push(val.location_id);
                    
                });
            });
            
            var trueMarkers = new Array();
            var falseMarkers = new Array();
            
            for(var i = 0; i< markers.length; i++){
                for(var j = 0; j<markers.length; j++){
                    if(markers[j].id == searchLocationID[i]){
                        trueMarkers.push(markers[j]);
                    }
                    else{
                        falseMarkers.push(markers[j]);
                    }
                }    
            }
            for(var i = 0; i<falseMarkers.length; i++){
                falseMarkers[i].setVisible(false);
            }
            for(var i = 0; i<trueMarkers.length; i++){
                trueMarkers[i].setVisible(true);
            }
            
            boundChangedEvent();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });
   
}
