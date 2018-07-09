<?php 
error_reporting(E_ALL ^ E_NOTICE);
require 'dbcon.php';
require 'dbfunctions.php';
session_start();

if(!isset($_SESSION['level']))
{
	echo "some error!";
	die();
}
//else
	//getLevelData($_SESSION['level']);

if(isset($_POST['fetch']))
{
	$what=$_POST['fetch'];
	if($what=='question')
		echo json_encode($_SESSION['question']);
}
else if(isset($_POST['submit']))
{
	$what=$_POST['submit'];
	$text=$_POST['text'];
	if($what=='answer')
		echo json_encode(checkAnswer($text));
	else if($what=='story')
		checkStory($text);
}

function checkAnswer($answer)
{
	$response=[];
	if($answer===$_SESSION['answer'])
	{
		$response['correct']='yes';
		$response['story']=$_SESSION['story'];
		$response['options']=getOptions();
	}
	else
		$response['correct']='no';
	return $response;
}

function checkStory($choice)
{
	$response=[];
	$deltaLevel=0;
	$deltaSuper=0;
	$levelType="best";
	if(($_SESSION['level']-1)%3==0) //Answering best type question
	{
		if($choice===$_SESSION['bestOption'])
		{
			$deltaLevel=3;  //go to next best level
			$deltaSuper=$_SESSION['givesSuperpower'];
		}
		else if($choice===$_SESSION['okOption'])
			$deltaLevel=1;  //go to ok type of this level
		else
			$deltaLevel=2;  //go to bad type of this level
	}
	else if(($_SESSION['level']-2)%3==0) //Answering ok type question
	{
		if($choice===$_SESSION['bestOption'])
			$deltaLevel=2;  //go to next best level
		else
			$deltaLevel=1;  //go to bad type of this level
	}
	else  //Answering bad type question
	{
		if($choice===$_SESSION['bestOption'])
			$deltaLevel=1;  //go to next best level
		else
		{
			$deltaLevel=0;
			//Kill or check superpower
			echo json_encode("Game over");
			return;
		}
	}
	
	$newLevel=$_SESSION['level']+$deltaLevel;
	$newSuper=$_SESSION['superpowers']+$deltaSuper;
	$update=setUserData($_SESSION['userid'],$newLevel,$newSuper);
	if($update)
	{
		$_SESSION['level']=$newLevel;
		$_SESSION['superpowers']=$newSuper;
		$response['superpowers']=$newSuper;
		getLevelData($newLevel);
	}
	else
		$response['error']=$update;
	echo json_encode($response);
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

function getSessionVar($key)
{
	return $_SESSION[$key];
}
?>