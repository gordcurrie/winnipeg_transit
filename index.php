<?php
	$title = 'Home';
	require('./header.php')
?>

<body class="text_panels">
    <input type="button" id="bug" value="Report Bug" onclick="window.location='mailto:borntobedad@gmail.com?subject=Bug%20Report'"/>
    <a href=./map_search.php><input id="nearby" class="top_left" type="button" value="Local Stops" /></a><br />
    <a href="./text_search.php"><input type="button" class="top_left" value="Text Search" /></a>
    <div id='weather'>
		<object id="weather" class="top_left" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="190" height="125">
			  <param name="movie" value="http://dd.weatheroffice.gc.ca/lib/flash/wxlink_e.swf" />
			  <param name="FlashVars" value="cityCode=mb-38&amp;siteCode=s0000193&amp;provCode=MB&amp;language=e" />
			  <param name="quality" value="high" />
			  <embed src="http://dd.weatheroffice.gc.ca/lib/flash/wxlink_e.swf" FlashVars="cityCode=mb-38&amp;siteCode=s0000193&amp;provCode=MB&amp;language=e" quality="high" pluginspage="http://www.adobe.com/go/getflashplayer" type="application/x-shockwave-flash" width="190" height="125" /> 
		 </object>
    </div>
</body>
</html>

