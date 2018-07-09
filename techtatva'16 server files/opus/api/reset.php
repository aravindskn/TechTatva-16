<?php
require 'dbcon.php';
global $conn;
$sql="UPDATE users SET level=1, detour=0, superpowers=0, badDecided=0, timedOut=0 WHERE id=".$_SESSION['userid'];
$result = $conn->query($sql);
if(!$result)
	echo mysqli_error($conn);
else
	echo "Reset successful";
?>