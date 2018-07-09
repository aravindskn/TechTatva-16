<!DOCTYPE html>
<html>
<head>
	<title>Reset Kraftwagon</title>
</head>
<body>
	<?php
	require 'dbcon.php';
	//session_start();
	if(!isset($_SESSION['userid']))
		die("Session var userid not set!");

	global $conn;
	$sql="UPDATE users SET milestone=1, level=1, questionViews=0, score=0, resets=5 WHERE id=".$_SESSION['userid'];
	$result = $conn->query($sql);
	if(!$result)
		echo mysqli_error($conn);
	else
		echo "Reset successful";
	?>
</body>
</html>