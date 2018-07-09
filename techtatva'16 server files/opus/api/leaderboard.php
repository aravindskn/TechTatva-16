<?php 
require 'dbfunctions.php';
if($_SESSION['timedOut'])
	die();

error_reporting(E_ALL ^ E_NOTICE);

global $conn;
$response=[];
$myLevel=$_SESSION['level'];

$sql="SELECT count(*) as ahead FROM users WHERE level>".$_SESSION['level'];
$result = $conn->query($sql);
if(!$result)
	die(mysqli_error($conn));
$row = $result->fetch_assoc();
$response['ahead']=$row['ahead'];

$sql="SELECT count(*) as behind FROM users WHERE level<".$_SESSION['level'];
$result = $conn->query($sql);
if(!$result)
	die(mysqli_error($conn));
$row = $result->fetch_assoc();
$response['behind']=$row['behind'];

echo json_encode($response);
?>