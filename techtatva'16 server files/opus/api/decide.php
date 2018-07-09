<?php
require 'dbfunctions.php';
if($_SESSION['timedOut'] || $_SESSION['badDecided'])
	die();

//require 'api/setTimeout.php';

$response=[];
$response['from']="decide.php";

if($_POST['choice']==="useSuper")
{
	if($_SESSION['superpowers']>0)
	{
		global $conn;	
		$newSuper=$_SESSION['superpowers']-1;
		$sql="UPDATE users SET badDecided=1, timedOut=0, superpowers=".$newSuper." where id=".$_SESSION['userid'];
		$result = $conn->query($sql);
		if(!$result)
			$response['error']=mysqli_error($conn);
		else
		{
			$_SESSION['superpowers']=$newSuper;
			$_SESSION['badDecided']=true;
			$_SESSION['timedOut']=false;
			$response['show']="question";
		}
	}
	//echo json_encode($response);
	//die();
}
else
{
	$response['redirect']='timeout';
}
echo json_encode($response);

?>