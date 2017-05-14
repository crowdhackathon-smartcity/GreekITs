 <?php
session_start();
?>

<html>

<?php include 'res/libs/headLibs.php'; ?>
<?php include 'res/libs/navbar.html'; ?>
<body>



<div class="w3-container"> 
  <h2>Ανακοινώσεις</h2>
</div>

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

$query_in="SELECT * FROM news";

/* Select queries return a resultset */
if ($result = $mysqli->query($query_in)) {
    while ($row = $result->fetch_row())
    {
		echo "<strong><u>$row[1]</u></strong>  στις ($row[3]) <p>
					$row[2]<br>  <br> ";


    }
    $result->close();
}
$mysqli->close();
?>

</body>
</html>
