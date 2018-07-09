<?php
require 'dbfunctions.php';
/*session_start();

/if(!isset($_SESSION['userid']))
	die("Session var userid not set!");*/

$response=[];
getQuestion();
echo json_encode($response);

function getQuestion()
{
	global $conn; global $response; global $lastLevel;
	if($_SESSION['level']>$lastLevel)
	{
		$response['redirect']="limit.html";
		return;
	}
	$row=getLevelData($_SESSION['level']);
	$now=currentTimestamp();
	
	$sql = "UPDATE users SET lastTimestamp = '".$now."' WHERE id=".$_SESSION['userid'];
	$result = $conn -> query($sql);
	if(!$result)
	{
		$response['error']=mysqli_error($conn);
		$response['errorAt']="getQuestion";
		return mysqli_error($conn);
	}
	$_SESSION['lastTimestamp']=$now;
	$_SESSION['questionViews']++;

	$response['question']=$row['question'];
	$response['image']=$row['image'];
}

function currentTimestamp()
{
	$now = new DateTime(date('Y-m-d H:i:s'));
	$nowString = $now->format("Y-m-d H:i:s");
	return $nowString;
}
?>