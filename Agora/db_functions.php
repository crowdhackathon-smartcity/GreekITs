<?php
   
            
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';
$database = 'agoradb';

$con = mysql_connect($db_host,$db_user,$db_pwd);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_query("SET NAMES UTF8");

	if (!mysql_select_db($database))
		die("Can't select database");

	mysql_query("SET NAMES 'utf8'");				
	mysql_query("SET CHARACTER SET 'utf8'");
	$result = mysql_query("select * from problems");
	
	if (!$result) {
		die("Query to show fields from News failed");
	}

	$fields_num = mysql_num_fields($result);
        
if (!$result) {
					echo 'Could not run query: ' . mysql_error();
				exit;
				}
			while($row = mysql_fetch_object($result)) {
          $products[] =  $row; 
        } mysql_free_result($result);
        
     
        
?>