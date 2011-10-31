<?php
    $br = '<br/>';
    require('./config.php');
    $stop_key = $_GET['key'];
    $stop_lat = $_GET['lat'];
    $stop_lng = $_GET['lng'];
    
    /*Function to calculate the difference in minutes bewteen to time date strings formatted
    * as '2011-09-11T22:57:23'. $time_0 is the earler time, $time_0 the later time 
    */
    function calc_time($time_0, $time_1)
    {
        $time_hours_0 = intval(substr($time_0, -8, 2));
        $time_minutes_0 = intval(substr($time_0, -5, 2));
        $time_total_0 = $time_hours_0*60+$time_minutes_0;

        $time_hours_1 = intval(substr($time_1, -8, 2));
        $time_minutes_1 = intval(substr($time_1, -5, 2));
        $time_total_1 = $time_hours_1*60+$time_minutes_1;    

        $time_difference = $time_total_1 - $time_total_0;
        if($time_difference < -60)
        {
            return "Undeteremined.";
        }
        else
        {
            return " in $time_difference min";
        }
    }
?>
<?php
	$title = 'Stop Schedule';
	require('./header.php')
?>
    <body onload="initialize(<?php echo "$stop_lat, $stop_lng"; ?>,17)">
        <div id="map_canvas"></div>
        <input type="button" id="bug" value="Report Bug" onclick="window.location='mailto:borntobedad@gmail.com?subject=Bug%20Report'"/>
        <table>
        <thead>
            <th>Route</th><th>Name</th><th>Next Stop</th><th>Following Stop</th>
        </thead>
<?php
    $api_url = "{$url_start}stops/$stop_key/schedule?max-results-per-route=2&api-key=$api_key";
    $xml = simplexml_load_file($api_url);
    $current_time = (string)$xml->attributes()->{"query-time"};
    $number_of_routes = count($xml->{"route-schedules"}->{"route-schedule"});
    for ($i=0;$i<$number_of_routes;$i++)
    {
        $route_number = $xml->{"route-schedules"}->{"route-schedule"}[$i]->route->number;
        $route_name = $xml->{"route-schedules"}->{"route-schedule"}[$i]->route->name;
        echo "      <tr>\n          <td>$route_number</td>";
        echo "<td>$route_name</td>";
        
        $number_of_stops = count($xml->{"route-schedules"}->{"route-schedule"}[$i]->{"scheduled-stops"}->{"scheduled-stop"});
        for ($j=0;$j<$number_of_stops;$j++)
        {
            $route_variant = $xml->{"route-schedules"}->{"route-schedule"}[$i]->{"scheduled-stops"}->{"scheduled-stop"}[$j]->{"variant"}->name;
            $departure_time = (string)$xml->{"route-schedules"}->{"route-schedule"}[$i]->{"scheduled-stops"}->{"scheduled-stop"}[$j]->times->departure->estimated;
            echo "<td title=\"$route_variant\">".substr($departure_time, -8, 5).calc_time($current_time, $departure_time)."</td>";
        }
        echo "\n      </tr>\n";
    }
?>       
    </table>
    <input type="button" id="return" onclick="go_back()" value="Change Stop"/>
    </body>
</html>