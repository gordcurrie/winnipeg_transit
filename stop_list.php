<?php
    require('./config.php');
    $search_term = $_POST['search_stops'];
 
    $search = explode(' ', $search_term);
    $unaccepted_array = array('street','st','st.','avenue','ave','ave.','av','av.','cresent','cres','boulevard','blvd','blvd.','road','rd.','rd','lane','highway','hwy','drive','dr','dr.','at','and');
    $end = count($search);
    $other_end = count($unaccepted_array);
    for($i=0;$i<$end;$i++)
    {
        for($j=0;$j<$other_end;$j++)
        {
            if($search[$i]==$unaccepted_array[$j])
            {
                $search[$i]='';
            }
        }
    }
    for($k=0;$k<$end;$k++)
    {
        if($search[$k]!='')
        {
            $url_start .= "/stops:$search[$k]"."+";
        }
    }
    $api_url="$url_start?api-key=$api_key;"
?>
<?php
	$title = 'Stop List';
	require('./header.php')
?>
<body>
    <div style="overflow:scroll;height:80px;width:100%;overflow:auto">
    <table>
        <thead>
            <th>Stop Number</th><th>Stop Name</th><th>Direction</th>
        </thead>
        
    <?php
        $xml = simplexml_load_file($api_url);
        $number_of_stops = count($xml->stop);
            for($i=0;$i<$number_of_stops;$i++)
            {
                $stop_key=(string)$xml->stop[$i]->key;
                $stop_name=(string)$xml->stop[$i]->name; 
                $stop_lat=(string)$xml->stop[$i]->centre->geographic->latitude; 
                $stop_lng=(string)$xml->stop[$i]->centre->geographic->longitude; 
                $stop_direction=(string)$xml->stop[$i]->direction;         
                echo "<tr>\n".
                        "   <td>$stop_key</td><td><a href=\"$home/stop_schedule.php?key=$stop_key&lat=$stop_lat&lng=$stop_lng\">$stop_name</a></td><td>$stop_direction</td>\n".
                    "</tr>\n";
            }
    ?>
    </table>
    </div>
</body>
</html>
