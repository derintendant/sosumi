<?php
	require 'class.sosumi.php';
	require 'settings.php';

	$google_maps_key = GMAPS_API_KEY;

	$ssm = new Sosumi(ICLOUD_ACCOUNT, ICLOUD_PASSWORD);
	$loc = $ssm->locate();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Wo bin ich?</title>
	<!-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset-fonts-grids/reset-fonts-grids.css">
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/base/base-min.css"> -->
	<style type="text/css" media="screen">
		p { text-align:left; }
		#map_canvas {
			width:100%;
			min-height:100%;
			margin: 0;
			padding: 0;
		}
		html, body {
			height: 100%;
			margin: 0;
		}
	</style>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_key; ?>&sensor=false"></script>
	
	<script type="text/javascript">
	//<![CDATA[

	var center = new google.maps.LatLng(<?php echo $loc['latitude']; ?>, <?php echo $loc['longitude']; ?>);
	
	function load() {
		var map = new google.maps.Map(document.getElementById("map_canvas"), {
			center: center,
			zoom: 14,
			mapTypeId: 'roadmap'
		});

		// Change this depending on the name of your PHP file
		downloadUrl("db2xml.php", function(data) {
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName("marker");
			for (var i = 0; i < markers.length; i++) {
				var name = markers[i].getAttribute("dt");
				var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("lat")),
					parseFloat(markers[i].getAttribute("lng")));
				var recentMarker = new google.maps.Marker({
					map: map,
					position: point,
					title: name
				});
			}

		var currentMarkerInfo = new google.maps.InfoWindow({
			content: <?php echo json_encode($displayname); ?>
		});
		var currentMarker = new google.maps.Marker({
			map: map,
			position: center,
			icon: 'http://mt.google.com/vt/icon?psize=30&font=fonts/arialuni_t.ttf&color=ff304C13&name=icons/spotlight/spotlight-waypoint-a.png&ax=43&ay=48&text=%E2%80%A2',
			zIndex: google.maps.Marker.MAX_ZINDEX + 1,
			title: 'My Location'
		});
		
		currentMarkerInfo.open(map,currentMarker);

		google.maps.event.addListener(currentMarker, 'click', function() {
			currentMarkerInfo.open(map,currentMarker);
		});


	  });
	}

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP') :
			new XMLHttpRequest;

		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}

	//]]>

  	</script>
</head>
<body onload="load()">
	<div id="map_canvas"></div>
</body>
</html>
