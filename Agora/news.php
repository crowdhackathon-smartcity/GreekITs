 <?php
session_start();
?>

<html>

<head>
<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>
</head>


<body>



<div class="w3-container"> 
  <h2>Τα Νέα του Δήμου Μας</h2>
  <p></p>
</div>

<?php
require('config.php');
	
	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");

	if (!mysql_select_db($database))
		die("Can't select database");

	mysql_query("SET NAMES 'utf8'");				
	mysql_query("SET CHARACTER SET 'utf8'");
	$result = mysql_query("select * from news");
	
	if (!$result) {
		die("Query to show fields from News failed");
	}

	$fields_num = mysql_num_fields($result);




	if (!$result) {
					echo 'Could not run query: ' . mysql_error();
				exit;
				}
				while($row = mysql_fetch_row($result))
				{	
					echo "<strong><u>$row[1]</u></strong>  στις ($row[3]) <p>
					$row[2]<br>  <br> ";
		
				}
				mysql_free_result($result);
				
?>

</body>
</html>
