<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Testimonials</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="php hotel site, hotel online booking site">
	<meta name="description" content="ApPHP Hotel Site">
    <meta name="author" content="ApPHP Company - Advanced Power of PHP">
    <meta name="generator" content="ApPHP Hotel Site v3.9.1">

    <base href="">
	<link href="images\icons\apphp.ico" rel="SHORTCUT ICON">
  
    <link href="templates\x-brown\css\style.css" type="text/css" rel="stylesheet">
		<!--[if IE]>
	<link href="http://www.apphp.com/php-hotel-site/examples/sample2/templates/x-brown/css/style-ie.css" type="text/css" rel="stylesheet" />
	<![endif]-->

	<!-- Opacity Module -->
	<link href="modules\opacity\opacity.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="modules\opacity\opacity.js"></script>

	<script type="text/javascript" src="js\main.js"></script>
	<script type="text/javascript" src="js\cart.js"></script>	

    <script type="text/javascript" src="js\jquery-1.4.2.min.js"></script>
<!-- LyteBox v3.22 Author: Markus F. Hay Website: http://www.dolem.com/lytebox -->
<link rel="stylesheet" href="modules\lytebox\css\lytebox.css" type="text/css" media="screen">
<script type="text/javascript" src="modules\lytebox\js\lytebox.js"></script>
<script type="text/javascript" src="js\mootools.js"></script>
<!-- RokBox -->
<link rel="stylesheet" href="modules\rokbox\themes\dark\rokbox-style.css" type="text/css">
<link rel="stylesheet" href="modules\rokbox\themes\dark\rokbox-style-ie8.css" type="text/css">
<script type="text/javascript" src="modules\rokbox\rokbox.js"></script>
<script type="text/javascript" src="modules\rokbox\rokbox-config.js"></script>
    	
			

		<script type="text/javascript" src="http://www.apphp.com/js/demo.topbar.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.apphp.com/css/style.demo.topbar.css">	
</head>

<body dir="ltr">
<!--=========================================== MySQL connection ===========================================-->
<?php
require('config.php');
	
	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");

	if (!mysql_select_db($database))
		die("Can't select database");

	$result = mysql_query("select * from testimonials");
	$result2= mysql_query("select user_id from reservations");
	if (!$result) {
		die("Query to show fields from Testimonials failed");
	}
	if (!$result2) {
		die("Query to show fields from reservations failed");
	}
	$fields_num = mysql_num_fields($result);

?>
<!--=========================================== MySQL connection ===========================================-->
<a name="top"></a>
<div id="main">
	<!-- HEADER -->
	
<!-- header -->
<div id="header" style="height:207px;">
	<div class="row-1">
		<div class="wrapper">
			<div class="logo fleft">
				<h1><a href="index.php">Aνάκτηση&Εξόρυξη 5* </a></h1>
				<em>Hotel</em>
				<strong>
					Κάτι παραπάνω απο ξενοδοχείο...</strong>
			</div>

		</div>
	</div>

			<div class="row-4">
			<div class="row-4-inner">
				<ul class="nav nav_bg"><li><a href="index.php">Αρχικη</a></li><li><a href="rooms.php">Δωματια</a></li><li><a href="gallery.php">Γκαλερι</a></li><li><a href="restaurant.php">Παροχες</a></li><li><a class="current" href="testimonials.php">Κριτικες</a></li><li><a href="booking.php">Κρατησεις</a></li></ul>		  
			</div>
		</div>
		
	<div class="row-3">
					
<!-- language -->
			<div class="nav_language fleft">		
				<div style="margin-right:2px;font-size: medium;margin-top:5px;float:left;">Γλώσσες</div><div style="margin-top:5px;float:left;"><a href="index-35.php?page=pages&amp;system_page=testimonials&amp;lang=en" title="English"><img src="images\flags\el.gif" height="11px" title="Ελληνικά" alt="English" class="opacity_on"></a> </div>		
			</div>		
		
			<!-- currencies -->
			
			<div class="nav_currencies fleft">
			<div style="margin-right:2px;font-size: medium;margin-top:5px;float:left;">Νόμισμα</div>
			<select onchange="javascript:appSetNewCurrency('http://www.apphp.com/php-hotel-site/examples/sample2/index.php?page=pages&amp;system_page=testimonials&amp;currency=__CUR__',this.value)" name="currency" class="currency_select"><option value="USD" selected="selected">US Dollar<option value="EUR">Euro<option value="GBP">GB Pound<option value="AUD">AU Dollar</select>			</div>			

			<div class="header-search">
			
			
			</div>
			</form>			</div>
</div>				
	<!-- content -->
	<div id="content">
		<div class="wrapper">
			<div class="aside maxheight">
				<div class="box maxheight">
					<div class="inner">
						<!-- LEFT COLUMN -->
						<div class="left_box_container">


</div>
<div class="left_box_container">
<h3 class="side_box_heading">Πληροφορίες</h3>
<div class="side_box_content left">
<ul class="ltr"><li><a class="main_menu_link" href="http://www.apphp.com/php-hotel-site/examples/sample2/index.php?page=pages&amp;pid=4">Reception</a></li><li><a class="main_menu_link" href="http://www.apphp.com/php-hotel-site/examples/sample2/index.php?page=pages&amp;pid=25">Πώς θα φτάσετε εδώ;</a></li></ul></div>
<div class="shadow"></div>
</div>
<div class="left_box_container">
<h3 class="side_box_heading">Είσοδος</h3>
<!--============================= LOGIN   ===============================================-->
<?php


	if(empty($_SESSION["user_id"]) )
	{
		echo " <div class=\"side_box_content left\">   ";
		echo " <form class=\"authentication-form\" action=\"authenticate.php\" method=\"get\"> ";
		echo " 			<table border=\"0\" cellspacing=\"2\" cellpadding=\"1\"> ";
		echo " 			<tr>                                                                 ";
		echo " 				<td>                                                             ";
		echo " 					<input type=\"hidden\" name=\"submit_login\" value=\"login\">      ";
		echo " 					<input type=\"hidden\" name=\"type\" value=\"customer\">                           ";
		echo " 					<input type=\"hidden\" name=\"token\" value=\"5ebd7d6d8d3746dfc9372db312be1c61\">     ";
		echo " 				</td> ";
		echo " 			</tr>     ";
		echo " 			<tr><td>Username:</td></tr>";
		echo " 			<tr><td><input type=\"text\" style=\"width:130px\" name=\"login_usr\"  maxlength=\"50\" ></td></tr>             ";
		echo " 			                                                                                                        ";
		echo " 			<tr><td>Password:</td></tr>                                                                             ";
		echo " 			<tr><td><input type=\"password\" style=\"width:130px\" name=\"login_pswd\"  maxlength=\"20\"></td></tr>         ";
		echo " 			                                                                                                        ";
		echo " 			<tr><td style=\"height:5px\"></td></tr>                                                                   ";
		echo " 			<tr><td><input class=\"form_button\" type=\"submit\" name=\"submit\" value=\"Login\"> <br></td></tr>  ";
		echo " 			<tr><td></td></tr><tr><td><a class=\"form_link\" href=\"login.php\">Create account</a></td></tr><tr></tr></table> ";
		echo " 		</form></div>  ";
	}	
	else
	{
		echo "Welcome {$_SESSION["username"]} ! <br>";
		echo "<a class=\"form_link\" href=\"logout.php\"><u>Log out</u></a>";
	}
?>
<div class="shadow"></div>
</div>
<div class="left_box_container">
<h3 class="side_box_heading">Νέα</h3>
<div class="side_box_content left">
<ul class="news-block"><li><br><a class="category-news" href=""><i>Read more &raquo;</i></a></li></ul></div>
<div class="shadow"></div>
</div>
<div class="left_box_container">
<h3 class="side_box_heading">Πληρωμές</h3>
<div class="side_box_content left">
<div class="payment_instruments"><img src="images\ppc_icons\logo_paypal.gif" title="PayPal" alt="PayPal">
							  <img src="images\ppc_icons\logo_ccVisa.gif" title="Visa" alt="Visa">
							  <img src="images\ppc_icons\logo_ccMC.gif" title="MasterCard" alt="MasterCard">
							  <img src="images\ppc_icons\logo_ccAmex.gif" title="Amex" alt="Amex"></div></div>
<div class="shadow"></div>
</div>
<div class="left_box_container">
<h3 class="side_box_heading">Τοπική Ώρα</h3>
<div class="side_box_content left">
15 Ιουνίου, 2015<br>Πέμπτη 2:22 PM</div>
<div class="shadow"></div>
</div>
<div>&nbsp;</div>                            
						<!-- END OF LEFT COLUMN -->
	
						<!-- RIGHT COLUMN -->
												<!-- END OF RIGHT COLUMN -->
					</div>                  
				</div>
			</div>
			
			<div class="content">                    
				<!-- MAIN CONTENT -->
				<h1 class="center_box_heading align_left">Κριτικές</h1>
				<div class="pages_contents">
<!--==MAIN========----------------------------------------------------------------------------> 
				<?php
				if (!$result) {
					echo 'Could not run query: ' . mysql_error();
				exit;
				}
				$reservation = 0;
				while($row = mysql_fetch_row($result))
				{	
					echo "<strong><u>$row[1]</u></strong>, $row[2] από ($row[3])<br> <h4> Σχόλιο: </h4> $row[4] <br> ";

					
					while($row2 = mysql_fetch_row($result2))
					{
						if($row2[0] == $_SESSION["user_id"])
							$reservation = 1;
					}
				}
				mysql_free_result($result);
				
				if($reservation == 1)
				{
					echo "<form action=\"add_new_testimony.php\" id=\"usrform\" method=\"get\"> ";
					echo "<br>";
					echo "<textarea name=\"comment\" rows=\"4\" cols=\"80\">...</textarea> <br>       ";
					echo "<input type=\"submit\">                                                                ";
					echo "</form>                                                                              ";
				}
				else
				{
					echo "<u><h3>Πρέπει να έχετε κάνει κράτηση για να κάνετε σχόλιο</h3></u>";
				}
				?>

<!--==MAIN========----------------------------------------------------------------------------> 
				<!-- END OF MAIN CONTENT -->                    
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	
<!-- footer -->
<div id="footer">
    <div class="wrapper">
        <div class="fleft">
            <ul class="_nav">
                <a href="index.php">Home</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-13.php?page=pages&amp;system_page=about_us">About Us</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-14.php?page=pages&amp;system_page=contact_us">Contact Us</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-15.php?page=pages&amp;system_page=terms">Terms and Conditions</a><br><a href="index-1.php?page=pages&amp;system_page=rooms">Rooms</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-2.php?page=pages&amp;system_page=gallery">Gallery</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-3.php?page=pages&amp;system_page=restaurant">Restaurant</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-4.php?page=pages&amp;system_page=testimonials">Testimonials</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a href="index-5.php?page=booking">Booking</a><br>		  
                
            </ul>
        </div>
        <div class="fright">
            <form name="frmLogout" id="frmLogout" style="padding:0px;margin:0px;" action="http://www.apphp.com/php-hotel-site/examples/sample2/index.php" method="post">
            				<a class="main_link" href="">Designed by Fassaris Panagiotis</a>&nbsp;&nbsp;<img src="images\divider.gif" width="1px" height="15px" alt="divider" style="margin:auto;">&nbsp;&nbsp;<a class="main_link" href="">AM:Cs121083, TEI of Athens</a>                
                        </form>
        </div>
    </div>
</div>
<div id="footer-2">
Fassaris Panagiotis@ TEI OF ATHENS DEPARTMENT OF INFORMATICS © <a class="footer_link" href="">All Rights Reserved</a>&nbsp;<img src="images\divider.gif" width="1px" height="10px" alt="divider" style="margin:auto;">&nbsp;</div>    
</div>    

<script type="text/javascript" src="templates\x-brown\js\calendar.js"></script>
<script type="text/javascript">
var calendar = new Object();var trCal = new Object();trCal.nextMonth = "Next";trCal.prevMonth = "Previous";trCal.closeCalendar = "Close";trCal.icons = "templates/x-brown/images/";trCal.iconPrevMonth2 = "butPrevMonth2.gif";trCal.iconPrevMonth = "butPrevMonth.gif";trCal.iconNextMonth2 = "butNextMonth2.gif";trCal.iconNextMonth = "butNextMonth.gif";trCal.currentDay = "04";trCal.currentYearMonth = "2015-6";var minimum_nights = "1";var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];var days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
cCheckDateOrder(document.getElementById("checkin_day"),"checkin_monthday","checkin_year_month","checkout_monthday","checkout_year_month");</script>

</body>
</html>