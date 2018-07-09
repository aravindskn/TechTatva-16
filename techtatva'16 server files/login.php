<?php
die();

$response['status']='false';
if(!isset($_POST['email']) || !isset($_POST['password']))
	messageAndDie("Parameters not set");

$conn = mysqli_connect('localhost', 'root', 'techTatva!6', 'registration');
if (!$conn) 
    messageAndDie("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM users WHERE email='".$_POST['email']."' AND password='".$_POST['password']."';";
$result = $conn -> query($sql);
$count=$result->num_rows;
if($count!==1)
	messageAndDie("Login failed. Check your credentials and try again.");

$row = $result -> fetch_assoc();
session_start();
$response['status']='true';
$_SESSION['userid']=$row['id'];
$response['userid']=$row['id'];
$_SESSION['username']=$row['name'];
$response['username']=$row['name'];
$_SESSION['regno']=$row['regno'];
$response['regno']=$row['regno'];
messageAndDie("Login Successful!");

function messageAndDie($msg)
{
	global $response;
	$response['message']=$msg;
	echo json_encode($response);
	die();
}
?>