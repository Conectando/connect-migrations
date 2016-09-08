<!DOCTYPE html>
<html>
  <head>
    <title>Showing pixel and tile coordinates</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      .map-info-window{
         background:#333;
         border-radius:4px;
         box-shadow:8px 8px 16px #222;
         color:#fff;
         max-width:200px;
         max-height:300px;
         text-align:center;
         padding:5px 20px 10px;
         overflow:hidden;
         position:absolute;
         text-transform:uppercase;
      }
      .map-info-window .map-info-close{
         float:right;
         cursor:pointer;
         margin-right:-5px;
         margin-left:5px;
      }
       
      .map-info-window h5{
         font-weight:bold;
      }
      .map-info-window p{
         color:#939393;
      }
    </style>
  </head>
  <body>
    
    <div id="map"></div>
    
    <script>

      var map;
      var infoWindow;
      var schools = null;

      function loadSchools() {
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;

        xhr.addEventListener("readystatechange", function () {
          if (this.readyState === 4) {
            console.log(this.responseText);
          }
        });

        xhr.open("GET", "http://104.131.150.75/api/v0.1/schools?include=details");
        xhr.setRequestHeader("accept", "application/json");
        xhr.setRequestHeader("cache-control", "no-cache");
        xhr.setRequestHeader("postman-token", "b8cf1f6e-3b65-2cfe-0641-a3dfe8455199");
        xhr.send(schools);
      }

      function initialize() {
         
          loadSchools();

         var mapOptions = {
            center: new google.maps.LatLng(40.601203, -8.668173),
            zoom: 9,
            mapTypeId: 'roadmap',
         };

         map = new google.maps.Map(document.getElementById('map'), mapOptions);

         // a new Info Window is created
         infoWindow = new google.maps.InfoWindow();

         // Event that closes the Info Window with a click on the map
         google.maps.event.addListener(map, 'click', function() {
            infoWindow.close();
         });

         // Finally displayMarkers() function is called to begin the markers creation
         displayMarkers();
      }

      // google.maps.event.addDomListener(window, 'load', initialize);

      function displayMarkers(){

        // this variable sets the map bounds and zoom level according to markers position
        var bounds = new google.maps.LatLngBounds();

        // For loop that runs through the info on data making it possible to createMarker function to create the markers
        for (var i = 0; i < schools.data.length; i++){

           var school_latlng = new google.maps.LatLng(schools.data[i].latitude, schools.data[i].longitude);
           var school_name = schools.data[i].name;
           var school_address = schools.data[i].address + ', ' + schools.data[i].colony + ' ' + schools.data[i].postal_code;

           createMarker(school_latlng, school_name, school_address);

           // Marker’s Lat. and Lng. values are added to bounds variable
           bounds.extend(school_latlng); 
        }

        // Finally the bounds variable is used to set the map bounds
        // with API’s fitBounds() function
        map.fitBounds(bounds);
      }

      // This function creates each marker and it sets their Info Window content
      function createMarker(latlng, name, address){
         
         var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            title: name
         });

         // This event expects a click on a marker
         // When this event is fired the Info Window content is created
         // and the Info Window is opened.
         google.maps.event.addListener(marker, 'click', function() {
            
            // Creating the content to be inserted in the infowindow
            var iwContent = '<div id="iw_container">' +
                              '<div class="iw_title">' + name + '</div>' +
                              '<div class="iw_content">' + address + '<br/></div></div>';
            
            // including content to the Info Window.
            infoWindow.setContent(iwContent);

            // opening the Info Window in the current map and at the current marker location.
            infoWindow.open(map, marker);
         });
      }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY', 'YOUR_API_KEY') }}&callback=initialize&language=es-MX" async defer></script>

  </body>
</html>