
var map;
var geocoder;

function initMap(lat,lon,ids) {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
      success(position,lat,lon,ids);
    });
  } else {
    error('Geo Location is not supported');
    var coords = {lat: 43.1, lng: -79.3};
    setMap(lat,lon,ids,coords);
  }
}


function setMap(lat,lon,ids,position){

    var mapDiv = document.getElementById("col1");
    map = new google.maps.Map(mapDiv, {
    center: position,
    zoom: 14
  });


  var geocoder = new google.maps.Geocoder();
  var num;

  for (var i = ids.length - 1; i >= 0; i--) {
    var coor = new google.maps.LatLng(lat[i], lon[i]);
    var marker = new google.maps.Marker({
      position: coor,
      map: map,
      title: ids[i],
      icon: "../images/houseIcon.jpeg",
    });  
    
   
    marker.addListener('click', function() {
      window.location.href = "houseTemplate/" + this.title;
    });

    marker.addListener('mouseover', function() {
      this.setIcon(null);
    });

    marker.addListener('mouseout', function() {
      this.setIcon("../images/houseIcon.jpeg");
    });

    


  };
  marker.addListener('click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });
}

function success(position,lat,lon,ids) {
     coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
     setMap(lat,lon,ids,coords);
}
