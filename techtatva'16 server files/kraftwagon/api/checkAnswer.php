<?php
require 'dbfunctions.php';
session_start();

if(!isset($_SESSION['userid']))
	die("Session var userid not set!");

$response=[];
checkAnswer($_POST['input']);
echo json_encode($response);

function checkAnswer($input)
{
	global $conn; global $response;
	//if($input!==$_SESSION['answer'])
	$compare=preg_replace("/[^a-zA-Z0-9_]+/", "", $_SESSION['answer']);
	if(strcasecmp($input, $compare)!=0)
	{
		$response['correct']=false;
		$response['score']=$_SESSION['score'];
		$input=strtolower($input);
		$compare=strtolower($compare);
		similar_text($input, $compare, $percent);
		if($percent>85.0)
			$response['message']="Almost correct...";
		else
			$response['message']="Incorrect!";
		return;
	}

	//Answer is correct
	$response['correct']=true;
	$nextLevel=$_SESSION['level']+1;
	$bonus=0;
	
	if($_SESSION['questionViews']===1) //First attempt
	{
		$response['firstAttempt']=true;
		$seconds=timeToAnswer(); //Move to first attempt only
		$response['timeTaken']=$seconds;
		if(($_SESSION['questionTime']-$seconds)>=0)  //Answer in bonus time
		{
			$bonus=$_SESSION['questionBonus'];
			$response['bonus']=$bonus;
		}
	}
	$newScore=$_SESSION['score']+$_SESSION['questionPoints']+$bonus;

	$update=unlockLevel($_SESSION['userid'], $nextLevel, $newScore);
	if($update)
	{
		$_SESSION['level']=$nextLevel;
		$_SESSION['score']=$newScore;
		$_SESSION['questionViews']=0;

		if(isMilestone($_SESSION['level']))
		{
			$_SESSION['milestone']=$_SESSION['level'];
			$response['milestone']=true;
		}
		$response['score']=$_SESSION['score'];
		$response['level']=$_SESSION['level'];
	}
	else
		$response['error']=mysqli_error($conn);	
}

function timeToAnswer()
{
	$now = new DateTime(date('Y-m-d H:i:s'));
	$nowString = $now->format("Y-m-d H:i:s");

	$then = new DateTime($_SESSION['lastTimestamp']);
	$thenString = $then->format("Y-m-d H:i:s");

	$diff = $then->diff($now);
	$diffString=$diff->format("%H:%I:%S");
	$seconds = diffInSeconds($diffString);
	return $seconds;
}

function diffInSeconds($str_time)
{
	sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
	$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
	return $time_seconds;
}
?>