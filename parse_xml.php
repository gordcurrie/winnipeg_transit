<!DOCTYPE html> 
<html> 
    <head> 
        <link rel="stylesheet" type="text/css" href="./common.css"/> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <script type="text/javascript" src="./common.js"></script> 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">initialize(null,null,16);
        function add_stops(lat,lng)
        {
            var loc = new google.maps.LatLng(lat,lng);
            var marker = new google.maps.Marker
            ({
                position: loc,
                map: this.map,
                marker: marker
            });
        };
        add_stops(49.89995, -97.14124);
        </script>
        <title>Local Stops</title> 
    </head> 
    <body> 
        <div id="map_canvas"></div>
      <script type="text/javascript"></script> 
      <input type="button" id="10665"  value="Stop 10665" onmouseover="add_stops(49.89995, -97.14124, 10665)"/> 
      <script type="text/javascript">window.setTimeout(function() {add_stops(49.89995, -97.14124)}, 5000)</script>
    </body> 
</html>