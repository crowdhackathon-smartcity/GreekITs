<?php


  $db_host="localhost"; // Host name
  $db_username="root"; // Mysql username
  $db_password=""; // Mysql password
  $db_name="agoradb"; // Database name

// Connect to server and select databse.
$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);

//supports utf8
mysqli_set_charset($mysqli, "utf8");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query_in="SELECT * FROM problems";

/* Select queries return a resultset */
if ($result = $mysqli->query($query_in)) {
    while ($row = $result->fetch_object())
    {
		$problems[] =  $row; 


    }
    $result->close();
}
//echo $problems[0]['title'];


//var_dump($problems);
        
?>