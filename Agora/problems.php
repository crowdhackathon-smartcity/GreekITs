<!DOCTYPE html>
<html>

<head>
<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>


<link rel="stylesheet" type="text/css" href="css/sidebar01.css">
 <style type="text/css">
               body {
                       font-family: sans-serif;
                       font-size: 14px;
               }
       </style>
      
       <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLha_GB44Ty36f2RwDHHz5YEameQYTB5Q&sensor=false&amp;libraries=places" type="text/javascript"></script>
       
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
</script>
     
	


<script>
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("main").style.marginLeft = "250px";
	}

	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    document.getElementById("main").style.marginLeft= "0";
	}
</script>

<body>



	<div id="mySidenav" class="sidenav w3-theme-dark">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>




	  <div class="w3-section w3-center w3-large">
	  	<b>Δήλωση Προβλήματος</b>
	  </div>


      <form class="w3-container">
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
          <input class="w3-input w3-border" type="file"  accept="image/*" name="image" required>



          <button class="w3-btn-block w3-section w3-padding" type="submit">Υποβολή Προβλήματος</button>
        </div>
      </form>

	</div>

	<!-- Use any element to open the sidenav -->



	<div id="mainSideBarPage">

	<div class="right-arrow" onclick="openNav()"></div>

	</div>






</body>
</html>
