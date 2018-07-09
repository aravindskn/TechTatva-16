<?php 
require 'dbfunctions.php';
if($_SESSION['timedOut'])
	die();

$response=[];
$response['from']="getQuestion.php";

global $lastLevel;
if($_SESSION['level']>$lastLevel)
{
	$response['redirect']="limit";
	echo json_encode($response);
	die();
}

getLevelData($_SESSION['level']);
$response['level']=$_SESSION['level'];
$response['story']=$_SESSION['story'];
$response['superpowers']=$_SESSION['superpowers'];
$response['image']=$_SESSION['image'];

if($_SESSION['levelType']==="bad")
{
	$response['detectedBadLevel']=true;
	if(!$_SESSION['badDecided'])
	{
		if($_SESSION['superpowers']>0)
			$response['show']='decide';
		else
			$response['redirect']='timeout';

		echo json_encode($response);
		die();
	}
	//badDecision has been made
	//If timeout was decided or given, die() has been called
	//Else superpower has been used, and question should be shown
}

$response['question']=$_SESSION['question'];

echo json_encode($response);

?>