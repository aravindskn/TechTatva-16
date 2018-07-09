<?php
header('Location: http://onlineevents.techtatva.in/over.html');
die();

session_start();
if(!isset($_SESSION['userid']))
	header('Location: ../../index.php');
	
$conn = mysqli_connect('localhost', 'root', 'techTatva!6', 'kraftwagon');
if (!$conn) 
    die("Connection failed: " . mysqli_connect_error());
$lastLevel=30;
// date_default_timezone_set('Asia/Kolkata');  //Server timezone to sync with MySQL now()
?>