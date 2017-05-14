<?php

  $db_host="localhost"; // Host name
  $db_username="root"; // Mysql username
  $db_password=""; // Mysql password
  $db_name="agoradb"; // Database name
  $tbl_name="users"; // Table name

// Connect to server and select databse.
$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];


$query_in="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

/* Select queries return a resultset */
if ($result = $mysqli->query($query_in)) {
    printf("Select returned %d rows.\n", $result->num_rows);
    if ($result->num_rows >= 1 ){

		// Register $myusername, redirect to file "index.php"
		session_start();
		$_SESSION["username"] = $myusername;
		header('Location: ' . $_SERVER['HTTP_REFERER']);
}



    /* free result set */
    $result->close();
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Wrong Username or Password!");'; 
	echo 'window.location.href = "../../index.php";';
	echo '</script>';
}

$mysqli->close();


?>