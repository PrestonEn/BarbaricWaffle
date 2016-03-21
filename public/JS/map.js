
var map;
var geocoder;

function initMap(arr, ids) {
  var mapDiv = document.getElementById("col1");


  map = new google.maps.Map(mapDiv, {
    center: {lat: 43.1, lng: -79.3},
    zoom: 3
  });
  var geocoder = new google.maps.Geocoder();

  getCoor('Saint Catharines, Ontario', map, geocoder);
  for (var i = arr.length - 1; i >= 0; i--) {
    getCoor(arr[i],map,geocoder,ids[i]);
  };
}

function getCoor(address, map, geocoder, num){

  geocoder.geocode({'address':address}, function(results,status){
    if (status === google.maps.GeocoderStatus.OK) {
      var marker = new google.maps.Marker({
      position: results[0].geometry.location,
      map: map,
      title: num,
      icon: "../images/houseIcon.jpeg",
    });
  }    
    else {
      //alert('Cannot compute Coordinates : ' + status);
    };
  });
}
