<?php 
error_reporting(E_ALL ^ E_NOTICE);
require 'dbcon.php';
//session_start();
function getLevelData($id)
{
	global $conn;
	$setSize=12;
	$max=$_SESSION['level']*$setSize;
	$min=$max-$setSize+1;
	$randomQ=mt_rand($min, $max);

	$sql = "SELECT * FROM questions WHERE id=".$randomQ;
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();

	$_SESSION['question']=$row['question'];
	$_SESSION['answer']=$row['answer'];
	$_SESSION['questionPoints']=$row['points'];
	$_SESSION['questionBonus']=$row['bonus'];
	$_SESSION['questionTime']=$row['time'];
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
		$sql="INSERT into users (id) VALUES (".$id.")";
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
	$_SESSION['userid']=$row['id'];
	$_SESSION['milestone']=$row['milestone'];
	/*if($_SESSION['allowRetry'])
	{
		$_SESSION['level']=$row['milestone']; //Set as milestone only
	}
	else
		$_SESSION['level']=$row['level'];*/
	$_SESSION['level']=$row['level'];
	$_SESSION['lastTimestamp']=$row['lastTimestamp'];
	$_SESSION['questionViews']=$row['questionViews'];
	$_SESSION['score']=$row['score'];
	//$_SESSION['gameTime']=$row['gameTime'];
	$_SESSION['resets']=$row['resets'];
}

function unlockLevel($id, $level, $score)
{
	global $conn;

	$also='';
	if(isMilestone($level))
	{
		$scoreStatement=",score=".$score;
		$milestone=",milestone=".$level;
		$also=$scoreStatement.$milestone;
	}

	$sql="UPDATE users SET level=".$level. $also . ",questionViews=0 WHERE id=".$id;
	$result = $conn->query($sql);
	if(!$result)
		return false;
	else
		return true;
}

function isMilestone($level)
{
	$milestones=array(1,5,10,15,20,21,22,23,24,25,26,27,28,29,30); 
	foreach ($milestones as $key => $value) 
	{
		if($level===($value+1)) //+1 for all because next level check
			return true;
	}
	return false;
}
?>