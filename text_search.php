<?php
	$title = 'Text Search';
	require('./header.php')
?>

<body class="text_panels">
   <form action="./stop_list.php" method="post">
      <input id="search_stops" name="search_stops" class="search_input" type="text" title="street at cross-street" value="street at cross-street" onblur="default_text('search_stops')" size="30" maxlength="60" onclick="select();" /><br />
      <input id="search_stops_button" type="submit" class="top_left" value="Search for Stop" />
   </form>
   <form action="./local_stops.php" method="post">
      <input id="search_address" name="search_address" class="search_input" type="text" title="street address" value="street address" onblur="default_text('search_address')" size="30" maxlength="60" onclick="select();" /><br />
      <input id="search_address_button" type="submit" class="top_left" value="Search for Street Address" />
   </form>
</body>
</html>