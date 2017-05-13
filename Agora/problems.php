<!DOCTYPE html>
<html>

<head>
<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>
</head>


	<script
		src="http://maps.googleapis.com/maps/api/js">
	</script>

	<script>
	function initialize() {
	  var mapProp = {
		center:new google.maps.LatLng(37.97532689557135,23),
		zoom:7
	,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
<body>

<div id="googleMap" style="width:100%;height:1000px;"> 






</body>
</html>
