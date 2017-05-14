ε<!DOCTYPE html>
<html>

<head>
<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>
   	<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

      
       <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLha_GB44Ty36f2RwDHHz5YEameQYTB5Q&sensor=false&amp;libraries=places" type="text/javascript"></script>
       
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>


    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

<link rel="stylesheet" type="text/css" href="css/sidebar01.css">

<style>


div#mapid {
       z-index: 0;
}
</style> 

<script type="text/javascript">
       function initialize() {
               var input = document.getElementById('searchTextField');
               
               var autocomplete = new google.maps.places.Autocomplete(input);
              
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
               var place = autocomplete.getPlace();
               var loc =  place.geometry.location;
              // var res = loc.split(",");
                 //console.log("input: " + loc.lng());
               document.getElementById("lat_id").value = loc.lng();
               document.getElementById("lng_id").value = loc.lat();                          
              
    });                         
       }
       google.maps.event.addDomListener(window, 'load', initialize);              
  
</script>


</head>



<script>


	function w3_open() {
	    document.getElementById("mySidebar").style.display = "block";
	}
	function w3_close() {
	    document.getElementById("mySidebar").style.display = "none";
	}

	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("mainSideBarPage").style.marginLeft = "250px";
	}

	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    document.getElementById("mainSideBarPage").style.marginLeft= "0";
	}


</script>



<body>
          
		  
		  
	<div id="mySidenav" class="sidenav w3-theme-dark">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>




	  <div class="w3-section w3-center w3-large">
	  	<b>Δήλωση Προβλήματος</b>
	  </div>


      <form class="w3-container" method="POST" action="res/insertProblem.php">
        <div class="w3-section ">
          <label><b>Τίτλος</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Εισάγετε Τίτλο Προβλήματος" name="title" required>
          <br>
          <label><b>Περιγραφή</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Εισάγετε Περιγραφή" name="description" required>

      	  <br>
          <label><b>Διεύθυνση</b></label>
          <input class="w3-input w3-border" id="searchTextField" type="text" placeholder="Εισάγετε Διεύθυνση" name="address" autocomplete="on" required>
                             
               <input id="lat_id" name="lat" type="hidden">
 			 <input id="lng_id" name="lng" type="hidden" >
          <br>
          <label><b>Φωτογραφία</b></label>
          <input class="w3-input w3-border" type="file"  accept="image/*" name="problemImage" required>



          <button class="w3-btn-block w3-section w3-padding" type="submit">Υποβολή Προβλήματος</button>
        </div>
      </form>
		  </div>
		  
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

	<?php 
	if(count($problems) > 0 ){
	foreach($problems as $problem) { ?>
	L.marker([<?php echo $problem->lat; ?>, <?php echo $problem->lng; ?>] , {icon: problemsIcon} ).addTo(mymap)
		.bindPopup("<div> <b> "+ " <?php echo $problem->title; ?> </b>"+"<br> <p> "+ " <?php echo  $problem->description; ?>" +" </p> <img src='res/images/problems/"+"<?php echo  $problem->image_path; ?>"+"' width='90%' height='90%' style='margin-left: auto; margin-right: auto;'/> <p> "+ " <?php echo  $problem->address; ?>" +"</p> </div>").openPopup();
  <?php 
	}}
  ?>

  L.marker([38.004642, 23.703084] , {icon: eventsIcon} ).addTo(mymap)
		.bindPopup("<div style=''> <b>Πανηγύρι Αγίας Βαρβάρας </b><br> <img src='res/images/events/"+"panigiri01.jpg"+"' width=196px height=196px style='margin-left: auto; margin-right: auto;'/> </div>").openPopup();

	var popup = L.popup();

</script>  



</body>
</html>
