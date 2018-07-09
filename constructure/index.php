<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Constructure</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<style>
	img {
		transition: box-shadow 0.25s;
		-moz-transition: box-shadow 0.25s;
		-webkit-transition: box-shadow 0.25s;
		-o-transition: box-shadow 0.25s;
		box-shadow: 0 0 0 5px #ddd;
	}
	img:hover {
		box-shadow: 0 0 1em 1px #aaa;
	}
	</style>
</head>
<body class="landing">
	<div id="page-wrapper">

		<?php include("header.php"); ?>

		<!-- Banner -->
		<section id="banner">
			<h2>Constructure</h2>
			<p></p>
					<!-- <ul class="actions">
						<li><a href="#" class="button special">Sign Up</a></li>
						<li><a href="#" class="button">Learn More</a></li>
					</ul> -->
				</section>

				<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major" id="event_description">
							<h2>Event Description</h2>
							<p style="margin-bottom: 1.5em;">
								To protect the human civilization from white walkers it’s time to construct an engineered wall or a historic walls, which can resist the attack from them. The ground conditions are different for which you will have to build a different wall as each and every wall strength and stability depends on that. You will have to buy everything by answering questions. For each and every question you will get points, firstly you will have to get points to select the type of the wall. On the final day of the attack your wall’s strength will be judged based on type of wall used and type of component used. Brush up your skills to enjoy a mind bending game to experience one of the world’s most viewed show.
							</p>
							<input type="button" class="button" id="show_rules" value="Start" />
						</header>

						<header class="major" id="rules" style="display: none;">
							<h2>Rules</h2>
							<p style="margin-bottom: 1.5em;">
								1. Questions having options will only have two trials for answering them.<br />
								2. Questions having no options can be answered till you give up.<br />
								3. To learn about the walls and their materials you can refer books and internet although much needed information will be provided in the hints option.<br />
								4. Answer the questions without the units; the units in which the questions have to be answered will be specified.<br />
								5. The event will end on the last day of tech tatva. <br />
							</p>
							<input type="button" class="button" id="show_wall" value="Next" />
						</header>

						<header class="major" id="wall" style="display: none;">
							<h2>You have to build this wall</h2>
							<p style="margin-bottom: 1.5em;">
								 <img src="./images/thewall_strongrock.jpg" style="height: 100%; width: 18%;" />
								 <img src="./images/thewall_muddy.jpg" style="height: 100%; width: 18%;" />
								 <img src="./images/thewall_icy.jpg" style="height: 100%; width: 18%;" />
								 <img src="./images/thewall_highload.jpg" style="height: 100%; width: 18%;" />
								 <img src="./images/thewall_strongrock.jpg" style="height: 100%; width: 18%;" />
							</p>
							<form action="user_home.php" method="post">
								<input type="submit" class="button" name="start" value="Start Game" />
							</form>
						</header>

					</section>

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

			<script>
			$(document).ready(function() {
				$("#show_rules").click(function() {
					$("#rules").slideToggle(350);
					$("#event_description").slideToggle(350);
				});
				$("#show_wall").click(function() {
					$("#rules").slideToggle(350);
					$("#wall").slideToggle(350);
				});
			});
			</script>

		</body>
		</html>
