<?php
    require('./config.php');
    $title = 'Testing Stops';
    $distance = '250';
    if(isset ($_POST['lat']))
    {
        $set=true;
    }
    else
    {
        $set=false;
    }
    if($set)
    {
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./common.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src=".\common.js"/></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <title><?php echo $title ?></title>
    </head>
</head>
<body>
    <h1><?php echo $title ?></h1>
    <form action="./stops.php" method="post">
        <label for="lat">Latitude:</label>
        <input id="lat" name="lat" type="text" value="<?php if($set){echo $lat;}?>"/>
        <label for="lng">Longitude:</label>
        <input id="lng" name="lng" type="text" value="<?php if($set){echo $lng;}?>"/>
        <input type="submit"/>
    </form>
    <?php    
        if($set)
        {
            echo "You are located at {$lat}, {$lng}";
        }
    ?>
    <div id="stops">
    </div>
</body>
</html>