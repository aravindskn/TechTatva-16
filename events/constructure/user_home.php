<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Generic - Alpha by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<style>
		img.wall {
			transition: box-shadow 0.25s;
			-moz-transition: box-shadow 0.25s;
			-webkit-transition: box-shadow 0.25s;
			-o-transition: box-shadow 0.25s;
			box-shadow: 0 0 0 5px #ddd;
			width: 18%;
		}
		img.wall:hover {
			box-shadow: 0 0 1px 1px #aaa;
		}
	</style>
</head>
<body>
	<div id="page-wrapper">

		<?php include_once("header.php");

		$levels = array();
		for($i = 1; $i <= 5; $i++) {
			if (get_answered_ratio($i) > 0) {
				$levels[$i - 1] = get_answered_ratio($i) * 100;
			} else {
				$levels[$i - 1] = 5;
			}
		}

		?>
		<!-- Main -->
		<section id="main" class="container">
			<header>
				<h2>Your Wall</h2>
				<p>Click on a portion of the wall to start building it</p>
			</header>
			<div class="box">
				<p style="margin-bottom: 1.5em; text-align: center; height: 20em; overflow: hidden; border-top: 2px solid #777; border-bottom: 2px solid #777;">
					<img src="" style="height: 100%; width: 0;">
					<a href="level_one.php">
						<img class="wall" src="./images/wall.jpg" style="height: <?php echo $levels[0]."%;"; ?>" />
					</a>
					<a href="level_two.php">
						<img class="wall" src="./images/wall.jpg" style="height: <?php echo $levels[1]."%;"; ?>" />
					</a>
					<a href="level_three.php">
						<img class="wall" src="./images/wall.jpg" style="height: <?php echo $levels[2]."%;"; ?>" />
					</a>
					<a href="level_four.php">
						<img class="wall" src="./images/wall.jpg" style="height: <?php echo $levels[3]."%;"; ?>" />
					</a>
					<a href="level_five.php">
						<img class="wall" src="./images/wall.jpg" style="height: <?php echo $levels[4]."%;"; ?>" />
					</a>
				</p>
			</div>
		</section>

		<?php include("footer.php"); ?>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollgress.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>

</body>
</html>
