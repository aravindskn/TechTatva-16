<?php 
error_reporting(E_ALL ^ E_NOTICE);
require 'dbcon.php';
session_start();

function getLevelData($id)
{
	global $conn;
	$sql = "SELECT * FROM levels where id=".$id;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION['question']=$row['question'];
	$_SESSION['answer']=$row['answer'];
	$_SESSION['story']=$row['story'];
	$_SESSION['bestOption']=$row['bestOption'];
	$_SESSION['okOption']=$row['okOption'];
	$_SESSION['badOption']=$row['badOption'];
	$_SESSION['givesSuperpower']=$row['givesSuperpower'];
	return $row;
}

function getUserData($id)
{
	global $conn;
	$sql = "SELECT * FROM users where id=".$id;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION['userid']=$row['id'];
	$_SESSION['username']=$row['name'];
	$_SESSION['level']=$row['level'];
	$_SESSION['superpowers']=$row['superpowers'];
}

function setUserData($id, $level, $super)
{
	global $conn;
	$sql="UPDATE users SET level=".$level." , superpowers=".$super." where id=".$id;
	$result = $conn->query($sql);
	if(!$result)
		return mysqli_error($conn);
	else
		return true;
}

?>