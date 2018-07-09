<?php
session_start();
$_SESSION['user_id'] = 1;
header("Location: index.php");1
?>