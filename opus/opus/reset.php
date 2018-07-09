<?php
require 'dbcon.php';
global $conn;
$sql="UPDATE users SET level=1, superpowers=0 WHERE id=1";
$result = $conn->query($sql);
if(!$result)
	echo mysqli_error($conn);
else
	echo "Reset successful";
?>