
var map;
var geocoder;

function initMap(arr, ids) {
  var coords;  
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      success(position,arr,ids);
    });
    

  } else {
    error('Geo Location is not supported');
    coords = {lat: 43.1, lng: -79.3};
    setMap(arr,ids,coords);
  }
}


function setMap(arr,ids,position){

    var mapDiv = document.getElementById("col1");
    map = new google.maps.Map(mapDiv, {
    center: position,
    zoom: 14
  });
  var geocoder = new google.maps.Geocoder();
  for (var i = arr.length - 1; i >= 0; i--) {
    getCoor(arr[i],map,geocoder,ids[i]);
  };
}


function getCoor(address, map, geocoder, ids){

  geocoder.geocode({'address':address}, function(results,status){
    if (status === google.maps.GeocoderStatus.OK) {
      var marker = new google.maps.Marker({
      position: results[0].geometry.location,
      map: map,
      title: address,
      icon: "../images/houseIcon.jpeg",
    });
      google.maps.event.addListener(marker, 'click', function(num) {
        window.location.href = "houseTemplate/"+ids;
      });
  }
   

    else {
      //alert('Cannot compute Coordinates : ' + status);
    };
  });
}

function success(position,arr,ids) {
     var latitude = position.coords.latitude;
     var longitude = position.coords.longitude;
     coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
     setMap(arr,ids,coords);
}
