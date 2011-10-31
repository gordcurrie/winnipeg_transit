<?php
    require('./config.php');
    
    if(isset($_POST['lat']))
    {
        $zoom_level;
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $distance = $_POST['distance'];
        if($distance <= 250)
        {
            $zoom_level = 17;
        }elseif($distance == 500)
        {
            $zoom_level = 16;
        }else
        {
            $zoom_level = 15;
        }
        $api_url = "{$url_start}stops?lon=$lng&lat=$lat&distance=$distance$api_key";
    }
    
    if(isset($_POST['search_address']))
    {
        $api_url = $url_start."locations:";
        $address = $_POST['search_address'];
        $search = explode(" ", $address);
        $end = count($search);
        for($i=0;$i<$end;$i++)
        {
            $api_url .= $search[$i].'+';
        }
        $api_url .= "?api-key=$api_key";
        $xml = simplexml_load_file($api_url);
        $lat = $xml->address->centre->geographic->latitude or die('Error finding address!');
        $lng = $xml->address->centre->geographic->longitude or die('Error finding address!');
        $distance = 500;
        $zoom_level = 16;
    }
?>
<?php
	$title = 'Local Stops';
	require('./header.php')
?>
        <input type="button" id="bug" value="Report Bug" onmousedown="window.location='mailto:borntobedad@gmail.com?subject=Bug%20Report'"/>
        <div id="map_canvas"></div>
        <script type="text/javascript">initialize(<?php echo $lat.','. $lng.','.$zoom_level; ?>)</script>
    <?php
        class bus_stop
        {
            private $key;
            private $name;
            private $lat;
            private $lng;
            private $distance;
            //using null lets me leave out attributes in my constructor
            public function __construct($key=null,$name=null,$lat=null,$lng=null,$distance=null)
            {
                $this->key = $key;
                $this->name = $name;
                $this->lat = $lat;
                $this->lng = $lng;
                $this->distance = $distance;
            }
            public function __get($name)
            {
                return $this->$name;
            }
        }
        $api_url = "{$url_start}stops?lon=$lng&lat=$lat&distance=$distance&api-key=$api_key";
        $xml = simplexml_load_file($api_url);
        $number_of_stops = count($xml->stop);
            for($i=0;$i<$number_of_stops;$i++)
            {
                $stop_one = new bus_stop($stop_key=(string)$xml->stop[$i]->key, 
                        $stop_name=(string)$xml->stop[$i]->name, 
                        $stop_lat=(string)$xml->stop[$i]->centre->geographic->latitude, 
                        $stop_lng=(string)$xml->stop[$i]->centre->geographic->longitude, 
                        $stop_distance=(string)$xml->stop[$i]->distances->direct);
                        
                echo "      <script type=\"text/javascript\">window.setTimeout(function(){add_stops($stop_lat, $stop_lng, $stop_key, \"$stop_name\");},2500,'JavaScript')</script>\n";
            }
    ?>
    <input type="button" id="return" onclick="go_back()" value="Change Search Distance"/>
    </body>   
</html>