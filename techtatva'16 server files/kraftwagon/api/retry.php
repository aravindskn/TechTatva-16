<?php
require 'dbfunctions.php';
if(!isset($_SESSION['userid']))
	die();

if($_SESSION['resets']==0)
{
	$response['error']="No more resets left!";
	echo json_encode($response);
	die();
}

doUserRetry($_SESSION['userid']);
function doUserRetry($id)
{
	global $conn;
	//$level=$_SESSION['milestone'];
	$newResets=$_SESSION['resets']-1;
	$sql="UPDATE users SET resets=".$newResets. ",level= ".$_SESSION['milestone'].",questionViews=0 WHERE id=".$id;
	//Bug: Will allow multiple bonuses
	//Level should be reset to milestone by calling getUserData()
	$result = $conn->query($sql);
	
	$response=[];
	if(!$result)
		$response['error']=mysqli_error($conn);
	else
	{
		//$_SESSION['allowRetry']=true;
		//getUserData($_SESSION['userid']);
		//$_SESSION['resets']=$newResets;
		//$response['resets']=$_SESSION['resets'];
		$response['success']=true;
		//header('Location: index.php');
	}	
	echo json_encode($response);
}
?>