<?php
require 'dbcon.php';
$response=[];
$response['from']="setTimeout.php";

doTimeout($_SESSION['userid']);
echo json_encode($response);

function doTimeout($id)
{
	global $conn; global $response;	
	$timeoutUntil=timeNowPlus(5*60); // 5 minutes
	$sql="UPDATE users SET badDecided=1, timedOut=1, timeoutEnds='".$timeoutUntil."' where id=".$id;
	$result = $conn->query($sql);
	if(!$result)
	{
		$error=mysqli_error($conn);
		$response['error']=$error;
		return $error;
	}
	else
	{
		$_SESSION['badDecided']=true;
		$_SESSION['timedOut']=true;
		$_SESSION['timeoutEnds']=$timeoutUntil;

		$response['success']=true;
		$response['timeoutUntil']=$timeoutUntil;
		return true;
	}
}

function timeNowPlus($seconds)
{
	$date = new DateTime();
	//echo $date->getTimestamp(). "<br>";
	$str='PT'.$seconds.'S';
	$date->add(new DateInterval($str));
	//echo $date->getTimestamp(). "<br>";
	//echo $date->format("Y-m-d H:i:s");
	return $date->format("Y-m-d H:i:s");
}

?>