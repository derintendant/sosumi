<?PHP
    require 'class.sosumi.php';
    
    // You'll need to enter your own Google Maps API key
    // Get one from here: http://code.google.com/apis/maps/signup.html
    $google_maps_key = '';

    // Enter your MobileMe username and password
    $ssm = new Sosumi('your_username', 'your_password');
    $loc = $ssm->locate();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Wo ist derintendant?</title>
    <!-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/base/base-min.css"> -->
    <style type="text/css" media="screen">
        p { text-align:left; }
        #map_canvas { width:100%; height:400px; border:1px solid #000; }
    </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?PHP echo $google_maps_key; ?>&amp;sensor=false"></script>
    <script type="text/javascript">
        function initialize() {
            var currentLocation = new google.maps.LatLng(<?PHP echo $loc['latitude']; ?>, <?PHP echo $loc['longitude']; ?>)
            var mapOptions = {
                center: currentLocation,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
            var marker = new google.maps.Marker({
                position: currentLocation,
                title: "derintendant"
            })
            marker.setMap(map);
        }
    </script>
</head>
<body onload="initialize()" onunload="GUnload()">
    <!--
    <form action="" method="post">
        <p>
            <label for="msg">Message:</label>
            <input type="text" name="msg" value="" id="msg">
            <input type="checkbox" name="alarm" value="1" id="alarm">
            <label for="alarm">Alarm?</label>
            <input type="submit" name="btnSend" value="Send" id="btnSend">
        </p>
    </form>
    -->
    <div id="map_canvas"></div>
    <br />
    <!-- <p>Genauigkeit: <?PHP echo $loc['accuracy']; ?></p> -->
</body>
</html>
