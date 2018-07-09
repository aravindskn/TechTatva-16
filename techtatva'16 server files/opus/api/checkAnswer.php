<?php 
require 'dbfunctions.php';
if($_SESSION['timedOut'])
	die();

$response=[];
$response['from']="checkAnswer.php";

$compare=preg_replace("/[^a-zA-Z0-9_]+/", "", $_SESSION['answer']);
if(strcasecmp($_POST['answer'], $compare)!=0)
{
	$response['correct']="no";
	echo json_encode($response);
	die();
}

$response['correct']="yes";

if($_SESSION['levelType']==="best")
{
	$_SESSION['canChoose']=true;
	$options=getOptions();
	if(sizeof($options)==0)
	{
		$_SESSION['canChoose']=true;
		$_SESSION['canSkip']=true;
		$response['redirect']="skip";
	}
	else
	{
		$response['show']="choice";
		$response['options']=$options;
	}

	echo json_encode($response);
	die();
	//Superpower grant test is in makeChoice.php
}

$_SESSION['canChoose']=false;
$nextCheckpoint;
if($_SESSION['levelType']==="ok")
	$nextCheckpoint=$_SESSION['level']+2;
else //Answering the bad question correctly
	$nextCheckpoint=$_SESSION['level']+1;

setUserLevel($nextCheckpoint);
$_SESSION['level']=$nextCheckpoint;

$response['level']=$nextCheckpoint;
$response['show']="question";
echo json_encode($response);
?>