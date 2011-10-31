<?php
	$title = 'Home';
	require('./header.php')
?>

<body>
	<input id="nearby" type="button" value="Nearby Stops"  /><br />
	<a href="./text_search.php"><input type="button" value="Text Search" /></a>
	<div id='weather'>
		<object id="weather" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="190" height="125">
			  <param name="movie" value="http://dd.weatheroffice.gc.ca/lib/flash/wxlink_e.swf" />
			  <param name="FlashVars" value="cityCode=mb-38&amp;siteCode=s0000193&amp;provCode=MB&amp;language=e" />
			  <param name="quality" value="high" />
			  <embed src="http://dd.weatheroffice.gc.ca/lib/flash/wxlink_e.swf" FlashVars="cityCode=mb-38&amp;siteCode=s0000193&amp;provCode=MB&amp;language=e" quality="high" pluginspage="http://www.adobe.com/go/getflashplayer" type="application/x-shockwave-flash" width="190" height="125" /> 
		 </object>
	</div>
</body>
</html>
