<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<script src = "http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAJrRee8lcuBjal_Qwv1b4OhRmXrbAxOE51wLermFQKP4HobgCmRRpCWLv4gCVtEwCAgdlXtjdzjRYow&sensor=true" type="text/javascript">
	</script>
	<script type="text/javascript">	
	function initialize() 
	{
      if (GBrowserIsCompatible()) 
	  {
        var map = new GMap2(document.getElementById("map_canvas"));
			//map.addControl(new GSmallMapControl());
			//map.addControl(new GMapTypeControl());
	        map.setCenter(new GLatLng(16.682028, 74.470320), 13);
		<!-- Marker -->	
		// Create a base icon for all of our markers that specifies the
		// shadow, icon dimensions, etc.
		var baseIcon = new GIcon(G_DEFAULT_ICON);
		baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
		baseIcon.iconSize = new GSize(20, 34);
		baseIcon.shadowSize = new GSize(37, 34);
		baseIcon.iconAnchor = new GPoint(9, 34);
		baseIcon.infoWindowAnchor = new GPoint(9, 2);
		// Creates a marker whose info window displays the letter corresponding
		// to the given index.
		function createMarker(point, index) {
		  // Create a lettered icon for this point using our icon class
		  var letter = String.fromCharCode("A".charCodeAt(0) + index);
		  var letteredIcon = new GIcon(baseIcon);
		  letteredIcon.image = "http://www.google.com/mapfiles/marker" + letter + ".png";
		  // Set up our GMarkerOptions object
		  markerOptions = { icon:letteredIcon };
		  var marker = new GMarker(point, markerOptions);
		  GEvent.addListener(marker, "click", function() {
		  marker.openInfoWindowHtml("D.K.T.E. Society's Textile & Engineering Institute, <br/> Rajwada , P.O.Box. No.130 ,Ichalkaranji-416 115 ,<br/> Dist: Kolhapur (MAHARASHTRA)INDIA.<br/>");
		  });
  		return marker;
	  }
	// Add 10 markers to the map at random locations
	var bounds = map.getBounds();
	var southWest = bounds.getSouthWest();
	var northEast = bounds.getNorthEast();
	var lngSpan = northEast.lng() - southWest.lng();
	var latSpan = northEast.lat() - southWest.lat();
	for (var i = 0; i < 1; i++) {
	  var point = new GLatLng(16.682028, 74.470320);
	  map.addOverlay(createMarker(point, i));
	}
		<!-- End -->
        map.setUIToDefault();
      }
    }
	</script>
<title>E-Learning: Contact Us</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body onload="initialize()" onunload="GUnload()">

<?php include ("includes/top_line.php"); ?>
<?php include ("includes/main_menu.php"); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<div id="contact_left">
	<b>Contact Us</b>
	D.K.T.E. Society's Textile & Engineering Institute,<br/>
	Rajwada, P.O.Box. No.130,<br/>
	Ichalkaranji-416 115<br/>
	Dist: Kolhapur (MAHARASHTRA) INDIA.<br/>
	Gram: DATTA TECH<br/>

	Phone: (0230) 2421300,2432340, 2439557 to 59<br/>

	Fax: (0230) 2432329<br/>

	E-mail : <br/>
	dkte@sancharnet.in <br/>
	kpr_textile@sancharnet.in <br/>
	admission@dktes.com <br/>
	</div>
	<div id="contact_right">
		<div id="map_canvas">
		</div>
	</div>
</div>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>
