var map;
var home = 'http://gordcurrie.ca/wpg_transit/';

function default_text(input)
{
    var text_box = document.getElementById(input);
    if(text_box.value != text_box.title)
    {
        text_box.style.color='#000';
        text_box.style.fontStyle='normal';
    }
}

function initialize(t_lat,t_lng, zoom_level)
{
    var lat; var lng; var tooltip;
    navigator.geolocation.getCurrentPosition(function(position)
    {
        if(zoom_level == null)
        {
            zoom_level = 16;
        }
        if(t_lat==null)
        {
            lat = position.coords.latitude;
            lng = position.coords.longitude;
            tooltip = "You are here "+lat+" "+lng;
        }
        else
        {
            lat = t_lat;
            lng = t_lng;
            tooltip = "Selected Stop";
        }
            var latlng = new google.maps.LatLng(lat, lng);
            var myOptions = 
            {
                zoom: zoom_level,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
            new google.maps.Marker
            ({
                position: latlng, 
                map: map, 
                title:tooltip
            });
            if(document.getElementById('location')!=null)
            {
                //passing lat and lng to form to pass to php.
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
            }
    });
}
function add_stops(lat,lng,key,name)
{
    var image = new google.maps.MarkerImage(
    './marker-images/image.png',
    new google.maps.Size(32,37),
    new google.maps.Point(0,0),
    new google.maps.Point(16,37)
    );

    var shadow = new google.maps.MarkerImage(
    './marker-images/shadow.png',
    new google.maps.Size(54,37),
    new google.maps.Point(0,0),
    new google.maps.Point(16,37)
    );

    var loc = new google.maps.LatLng(lat,lng);
    var marker = new google.maps.Marker
    ({
        position: loc,
        map: map,
        title: key+': '+name,
        icon: image,
        shadow: shadow
    });
        google.maps.event.addListener(marker, 'click', function() {
        document.location.href=home+"/stop_schedule.php?key="+key+"&lat="+lat+"&lng="+lng
    });
}
function go_back()
{
    window.history.go(-1)
}