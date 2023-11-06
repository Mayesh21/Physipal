

<!-- <?php

	require_once "./inc/config.php";
    require_once "./inc/db.php";
	require_once("./reusables/head.php");
	require_once("./reusables/constants.php");
    function getGeoCode($address)
{
        // geocoding api url
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyAQLs74-3xc4pj5vjBJyxHu6bcWB3U5vX8";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['lng'] = $json->results[0]->geometry->location->lng;
        return $data;
}
$add = 'Ahmednagar, India';
$add = str_replace(' ', '+', $add);
$result = getGeoCode($add);
echo 'Latitude: ' . $result['lat'];
echo 'Longitude: ' . $result['lng'];
?> -->
<!DOCTYPE HTML>
<head>
<title>my maps</title>
<style>
#map{
    width: 100%;
    height: 400px;
}
.mapContainer{
    width:50%;
    position: relative;
}
.mapContainer a.direction-link {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 100010;
    color: #FFF;
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    line-height: 25px;
    padding: 8px 20px 8px 50px;
    background: #0094de;
    background-image: url('');
    background-position: left center;
    background-repeat: no-repeat;
}
.mapContainer a.direction-link:hover {
    text-decoration: none;
    background: #0072ab;
    color: #FFF;
    background-image: url('');
    background-position: left center;
    background-repeat: no-repeat;
}
</style>
<script>
navigator.geolocation.getCurrentPosition(position=>{
const{latitude,longitude}=position.coords;
map.innerHTML='<iframe width="700" height="300" src="https://maps.google.com/maps?q='+latitude+','+longitude+'&map;z=15&amp"></iframe>';
});
</script>
<script>
var myCenter = new google.maps.LatLng(18.5228, 73.8389);
function initialize(){
    var mapProp = {
        center:myCenter,
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div class="mapContainer">
    <a class="direction-link" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=18.5228,73.8389&amp;hl=en">Get Directions</a>
    <div id="map"></div>
</div>
</body>
</html>