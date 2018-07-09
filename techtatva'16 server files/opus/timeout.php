<?php
require 'api/dbfunctions.php';
if(!$_SESSION['timedOut'])
	header('Location: index.php');

$check=strtotime($_SESSION['timeoutEnds']);
if(time()>$check)
{
	global $conn;
	$nextCheckpoint=$_SESSION['level']+1;
	$sql="UPDATE users SET badDecided='FALSE', timedOut='FALSE', level=".$nextCheckpoint." where id=".$_SESSION['userid'];
	$result = $conn->query($sql);
	if(!$result)
		echo mysqli_error($conn);
	else
	{
		$_SESSION['badDecided']=false;
		$_SESSION['timedOut']=false;
		$_SESSION['level']=$nextCheckpoint;
		header('Location: index.php');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TT16 : Hopeless Opus</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
    	body {
    		background: url('images/def.jpg');
    		background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Trebuchet MS';
    	}
    </style>
</head>
<body>
	<div class="container-fluid">
        <div class="row">
            <nav>
                <div class="col-xs-12">
                    TechTatva 16 | Hopeless Opus | <?php echo $_SESSION['username']; ?>
                </div>
            </nav>
        </div>
    </div>
    <div id="spacer" class="hidden-sm-down"></div>
    <div class="container">
    	<div class="row" style="text-align: center;">
    		<div class="col-xs-12 col-md-3 col-lg-2" id="sidebar-container">
               	<div class="sidebar-item">
                    <!-- <img src="images/map.png" class="img-fluid"> -->
                    <h1><?php echo $_SESSION['superpowers']; ?></h1>Super powers
                </div><!--
                --><div class="sidebar-item">
                    <!-- <img src="images/map.png" class="img-fluid">Map -->
                    <a href="instructions.html" target="_blank"><h1>Gu</h1>Guide</a>
                </div><!--
                -->
    		</div>
    		<div class="col-xs-12 col-md-9 col-lg-10" id="content-container">
                <div id="heading" class="content-background" style="margin-top: 0px">
                    <h3 style="margin: 0px;">Timeout</h3>
                </div>
                <div class="content-background">
                    <?php echo $_SESSION['story']; ?>
                </div>
                <div class="content-background">
                    Your timeout will expire at <?php echo $_SESSION['timeoutEnds']; ?>
                </div>
    		</div>
    	</div>
    </div> 
</body>
</html>