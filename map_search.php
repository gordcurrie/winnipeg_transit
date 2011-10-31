<?php
	$title = 'Your Location';
	require('./header.php')
?>
<body onload="initialize()">
  <div id="map_canvas"></div>
  <div id="location"></div>
  <input type="button" id="bug" value="Report Bug" onclick="window.location='mailto:borntobedad@gmail.com?subject=Bug%20Report'"/>
  <form id="local_stops" action="./local_stops.php" method="post" >
      <input type="hidden" name="lat" id="lat"/>
      <input type="hidden" name="lng" id="lng"/>
      <input type="submit" name="find_stop" id="find_stop" value="Search Distance" visiblity="hidden"/>
      <select id="distance" name="distance">
          <option value="100">100m</option>
          <option value="250">250m</option>
          <option value="500">500m</option>
          <option value="750">750m</option>
          <option value="1000">1000m</option>
      </select>
  </form>
</body>
</html>