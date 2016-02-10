        function initMap() {
          var mapDiv = document.getElementById("col1");
          var map = new google.maps.Map(mapDiv, {
            center: {lat: 43.1, lng: -79.3},
            zoom: 11
          });
        }