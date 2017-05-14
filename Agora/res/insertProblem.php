<?php

  $db_host="localhost"; // Host name
  $db_username="root"; // Mysql username
  $db_password=""; // Mysql password
  $db_name="agoradb"; // Database name
  $tbl_name="problems"; // Table name

// Connect to server and select databse.
$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// username and password sent from form
$title=$_POST['title'];
$desc=$_POST['description'];
$addr=$_POST['address'];
$lat=$_POST['lat'];
$lng=$_POST['lng'];
$image_path=$_POST['problemImage'];

$query_in="INSERT INTO $tbl_name (title,description,address,lat,lgn) VALUES ('$title','$desc','$addr','$lat','$lng')";


if ($mysqli->query($query_in) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
$mysqli->close();


?>