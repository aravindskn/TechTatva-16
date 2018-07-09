<?php 
require 'dbfunctions.php';
if($_SESSION['timedOut'])
	die();

if(!$_SESSION['canChoose']) //Must have gone through checkAnswer.php
	die();

$response=[];
$response['from']="makeChoice.php";

$nextLevel=$_SESSION['level'];
$newSuper=$_SESSION['superpowers'];
$newDetour=true;

if(!$_SESSION['detour'])
	$newSuper++;

if($_POST['choice']===$_SESSION['bestOption'] || ($_POST['choice']==="skip" && $_SESSION['canSkip']))
{
	$nextLevel+=3;
	$newDetour=false;
	$_SESSION['canSkip']=false;
}
else if($_POST['choice']===$_SESSION['okOption'])
{
	$nextLevel+=1;
}
else if($_POST['choice']===$_SESSION['badOption'])
{
	$nextLevel+=2;
}

$result=setUserData($nextLevel, $newDetour, $newSuper);
if(!$result)
{
	$response['error']=$result;
	die();
}

$_SESSION['level']=$nextLevel;
$_SESSION['detour']=$newDetour;
$_SESSION['superpowers']=$newSuper;
$_SESSION['badDecided']=false; //LATEST CHANGE

$response['show']='question';
$response['level']=$nextLevel;
$response['detour']=$newDetour;
$response['superpowers']=$newSuper;
echo json_encode($response);
?>