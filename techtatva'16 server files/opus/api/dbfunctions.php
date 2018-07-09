<?php 
error_reporting(E_ALL ^ E_NOTICE);
require 'dbcon.php';
//session_start();

function getLevelData($id)
{
	global $conn;
	$sql = "SELECT * FROM levels2 where id=".$id;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION['question']=$row['question'];
	$_SESSION['answer']=$row['answer'];
	$_SESSION['story']=$row['story'];
	$_SESSION['bestOption']=$row['bestOption'];
	$_SESSION['okOption']=$row['okOption'];
	$_SESSION['badOption']=$row['badOption'];
	$_SESSION['levelType']=questionType();
	$_SESSION['image']=$row['image'];
	return $row;
}

function getUserData($id)
{
	global $conn;
	$sql = "SELECT * FROM users where id=".$id;
	$result = $conn->query($sql);
	$count=$result->num_rows;

	if($count===0) //First time for this game
	{
		$sql="INSERT into users (id, name) VALUES (".$id.",'".$_SESSION['username']."')";
		$result = $conn->query($sql);
		if(!$result)
			return false;
		else //Query again to get user data
		{
			$sql = "SELECT * FROM users where id=".$id;
			$result = $conn->query($sql);
		}
	}

	$row = $result->fetch_assoc();
	//$_SESSION['userid']=$row['id'];
	//$_SESSION['username']=$row['name'];
	$_SESSION['level']=$row['level'];
	$_SESSION['detour']=$row['detour'];
	$_SESSION['superpowers']=$row['superpowers'];
	$_SESSION['badDecided']=$row['badDecided'];
	$_SESSION['timedOut']=$row['timedOut'];
	$_SESSION['timeoutEnds']=$row['timeoutEnds'];
}

function setUserData($level, $detour, $super)
{
	global $conn;
	if($detour)
		$detour=1;
	else
		$detour=0;
	$sql="UPDATE users SET level=".$level. ", detour=".$detour. ", superpowers=".$super. ", badDecided=0 WHERE id=".$_SESSION['userid'];
	//LATEST CHANGE: badDecided=0
	$result = $conn->query($sql);
	if(!$result)
		return mysqli_error($conn);
	else
		return true;
}

function setUserLevel($level)
{
	global $conn;
	$sql="UPDATE users SET level=".$level. " where id=".$_SESSION['userid'];
	$result = $conn->query($sql);
	if(!$result)
		return mysqli_error($conn);
	else
		return true;
}

function questionType()
{
	if(($_SESSION['level']-1)%3==0)
		return "best";
	else if(($_SESSION['level']-2)%3==0)
		return "ok";
	return "bad";
}

function getOptions()
{
	$opts=[];
	if($_SESSION['bestOption'])
		array_push($opts, $_SESSION['bestOption']);
	if($_SESSION['okOption'])
		array_push($opts, $_SESSION['okOption']);
	if($_SESSION['badOption'])
		array_push($opts, $_SESSION['badOption']);
	shuffle($opts);
	return $opts;
}

?>