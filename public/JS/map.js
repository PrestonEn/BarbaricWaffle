var map;
var geocoder;
var markers = new Array();
var j = 0; // counts the total number of markers we have - used to loop through all markers to check which are in current bounds
var markersInBound = new Array();
var markerArray = new Array();
var prices = new Array();
var titles = new Array();
var longitude = new Array();
var latitude = new Array();
var searchLocationID = new Array();
var infowindow;
var locationIDs = new Array();
var savedSearchArray = new Array();



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
    markerArray.length = 0;

    for (var i = 0; i < markers.length; i++) {

        if (bounds.contains(markers[i].getPosition())) {
            if (markers[i].getVisible() == true) {
                markersInBound[i] = markers[i].get('id');
                markerArray.push(markers[i]);
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
            if (!$.trim(data)) {

            } else {

                $("#sideBar").html(data);

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });

}


function getCoor(address, map, geocoder, ids, price, title, long, lat) {

    var latlng = new google.maps.LatLng(lat, long);

    var marker = new MarkerWithLabel({
        position: latlng,
        map: map,
        title: address,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 0,
        },
        labelAnchor: new google.maps.Point(15, 0),
        labelClass: "markerLabel",
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
function updateLatLongFromCity(cityName) {

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': cityName
    }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
        } else {
            alert("Something got wrong " + status);
        }
    });
}

//function to update according to filters
function searchFilters(e) {

    e.preventDefault();
    searchLocationID.length = 0;


    //needed in laravel for ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var prices = slider.noUiSlider.get();



    var form = $('#searchFilter').serialize() + "&minPrice=" + prices[0] + "&maxPrice=" + prices[1];

    //ajax call to update sideBar
    $.ajax({
        type: "POST",
        url: "/searchFilter",
        data: form,
        success: function (data) {
            var lat = 0;
            var long = 0;
            $.each(data, function (k, value) {

                $.each(value, function (key, val) {
                    searchLocationID.push(val.location_id);

                    if (val.latitude != undefined) lat = val.latitude;
                    if (val.longitude != undefined) long = val.longitude;

                });
            });

            //var input = $("#searchFilter select[name='region']").val();
            if (lat != 0) {
                map.setCenter(new google.maps.LatLng(lat, long));
            }
            var trueMarkers = new Array();
            var falseMarkers = new Array();

            for (var i = 0; i < markers.length; i++) {
                for (var j = 0; j < markers.length; j++) {
                    if (markers[j].id == searchLocationID[i]) {
                        trueMarkers.push(markers[j]);
                    } else {
                        falseMarkers.push(markers[j]);
                    }
                }
            }

            for (var i = 0; i < falseMarkers.length; i++) {
                falseMarkers[i].setVisible(false);
            }
            for (var i = 0; i < trueMarkers.length; i++) {
                trueMarkers[i].setVisible(true);
            }
            boundChangedEvent();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });
} //end search filters

//hover listing to show marker
function showMarker(id) {
    //markersInBound[id].set("labelClass", "markerHovered");
    //alert(markersInBound[id]);

    markers[markers.length - id].set("labelClass", "markerHovered");
    markers[markers.length - id].set("labelAnchor", new google.maps.Point(18, 0));
}

function hideMarker(id) {
    //markersInBound[id].set("labelClass", "markerHovered");
    //alert(markersInBound[id]);
    markers[markers.length - id].set("labelClass", "markerLabel");
    markers[markers.length - id].set("labelAnchor", new google.maps.Point(15, 0));
}

function saveSearch(e) {
    e.preventDefault();
    //needed in laravel for ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    var prices = slider.noUiSlider.get();


    var form = $('#searchFilter').serialize() + "&minPrice=" + prices[0] + "&maxPrice=" + prices[1];

    //ajax call to update sideBar
    $.ajax({
        type: "POST",
        url: "/saveFilter",
        data: form,
        success: function (data) {

            $.each(data, function (k, value) {

                $('#savedSearch').append($('<option>', {
                    value: value.saved_search_id,
                    text: value.city + "," + value.country,
                }));
                passToArray(value);
            });
            alert("Saved");



        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });
}

//passes all saveSearches into global array
function passToArray(savedSearch) {
    savedSearchArray.push(savedSearch);
}

function updateSearch(savedId) {
    var id = savedId.value - 1;

    if (savedSearchArray[id].num_bedrooms_total != 0) $("input[name='rooms']").val(savedSearchArray[id].num_bedrooms_total);
    else $("input[name='rooms']").val("");
    if (savedSearchArray[id].num_bathrooms_total != 0) $("input[name='bathrooms']").val(savedSearchArray[id].num_bathrooms_total);
    else $("input[name='bathrooms']").val("");


    $("#maxRoommates").val(savedSearchArray[id].num_roommates_max);

    $("#country").val(savedSearchArray[id].country);
    $("#region").val(savedSearchArray[id].city);


    if (savedSearchArray[id].owner_pays_internet == 0) $("input[name='internet']").prop("checked", false);
    else {
        $("input[name='internet']").prop("checked", true);
    }
    if (savedSearchArray[id].owner_pays_water == 0) $("input[name='water']").prop("checked", false);
    else {
        $("input[name='water']").prop("checked", true);
    }
    if (savedSearchArray[id].owner_pays_electricity == 0) $("input[name='hydro']").prop("checked", false);
    else {
        $("input[name='hydro']").prop("checked", true);
    }
    if (savedSearchArray[id].has_kitchen == 0) $("input[name='hasKitchen']").prop("checked", false);
    else {
        $("input[name='hasKitchen']").prop("checked", true);
    }
    if (savedSearchArray[id].allowed_dogs == 0) $("input[name='dogs']").prop("checked", false);
    else {
        $("input[name='dogs']").prop("checked", true);
    }
    if (savedSearchArray[id].allowed_cats == 0) $("input[name='cats']").prop("checked", false);
    else {
        $("input[name='cats']").prop("checked", true);
    }
    if (savedSearchArray[id].allowed_other_pets == 0) $("input[name='other']").prop("checked", false);
    else {
        $("input[name='other']").prop("checked", true);
    }
    if (savedSearchArray[id].has_furnishings == 0) $("input[name='furnished']").prop("checked", false);
    else {
        $("input[name='furnished']").prop("checked", true);
    }

    searchFilters(event);

}


function getCitiesFromCountry(country) {
    var c = country.value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    //ajax call to update sideBar
    $.ajax({
        type: "POST",
        url: "/getCitiesFromCountry",
        data: {
            country: c
        },
        success: function (data) {
            if ($.trim(data)) {
                $('#region').empty();
                $('#region').prop('disabled', false);
                $('#region').append($('<option>', {
                    value: data,
                    text: data,
                }));
            }
            else{
                $('#region').empty();
                $('#region').prop('disabled', true);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("POST: ", jqXHR, textStatus, errorThrown);
        }
    });


}