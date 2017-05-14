<!DOCTYPE html>
<html>

<head>
<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>
   	<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>


    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>


<link rel="stylesheet" type="text/css" href="css/sidebar01.css">
 

</head>

<body>
          
	<!-- Use any element to open the sidenav -->      

	<div id="mainSideBarPage">

	<div class="right-arrow" onclick="openNav()"></div>

	</div>
       <?php
  require('db_functions.php');

 ?>

  <div id="mapid" style="width: 1100px; height: 600px;"></div>
<script>
     <?php ?>
	var mymap = L.map('mapid').setView([38.017665, 23.685927], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
  
   var divProblemsIcon = L.divIcon({className: 'problems-div-icon'});     
   var problemsIcon = L.icon({
    iconUrl: 'res/images/mapIcons/problemIcon01.png',
    iconSize: [40, 40],
    iconAnchor: [22, 85],
    popupAnchor: [-3, -76]    
});

   var divActionsIcon = L.divIcon({className: 'actions-div-icon'});
      var actionIcon = L.icon({
    iconUrl: 'res/images/mapIcons/problemIcon01.png',
    iconSize: [40, 40],
    iconAnchor: [22, 85],
    popupAnchor: [-3, -76]    
});

   var divEventsIcon = L.divIcon({className: 'events-div-icon'});
      var eventsIcon = L.icon({
    iconUrl: 'res/images/mapIcons/fairIcon01.png',
    iconSize: [40, 40],
    iconAnchor: [22, 85],
    popupAnchor: [-3, -76]    
});

	<?php foreach($products as $product) { ?>
	L.marker([<?php echo $product->lat; ?>, <?php echo $product->lng; ?>] , {icon: problemsIcon} ).addTo(mymap)
		.bindPopup("<div style=''> <b> "+ " <?php echo $product->title; ?></b>"+"<br /> <p> "+ " <?php echo  $product->description; ?>" +" </p> <img src='res/images/problems/"+"<?php echo  $product->image_path; ?>"+"' width='90%' height='90%' style='margin-left: auto; margin-right: auto;'/> <p> "+ " <?php echo  $product->address; ?>" +"</p> </div>").openPopup();
  <?php 
       }
  ?>

  L.marker([38.004642, 23.703084] , {icon: eventsIcon} ).addTo(mymap)
		.bindPopup("<div style=''> <b>Πανηγύρι Αγίας Βαρβάρας </b><br />Εικόνα <img src='res/images/events/"+"panigiri01.jpg"+"' width='90%' height='90%' style='margin-left: auto; margin-right: auto;'/> </div>").openPopup();

	var popup = L.popup();

</script>  




</body>
</html>
