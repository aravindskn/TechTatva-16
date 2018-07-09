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
</head>
<body>
	<div id="page-wrapper">

		<?php include("header.php"); ?>
		<?php 
		if (isset($_POST['check_question'])) {
			
			$answer = mysqli_fetch_array(mysqli_query(getconn(), "select answer, points from level_2 where question_id = ".$_POST['question_id']));
			
			$answers = explode(";", $answer[0]);
			$correct = false;

			foreach ($answers as $ans) {
				if ($ans == $_POST['answer']) {
					$correct = true;
					break;
				}
			}

			if($correct) {
				
				$query = mysqli_query(getconn(), "update users set level_2 = ".$_POST['question_id'].", score = score + ".$answer[1]." where user_id = ".get_id());
				
				$query = mysqli_query(getconn(), "insert into has_answered values (".get_id().", 2, ".$_POST['question_id'].")");
				
				header("location: level_two.php?q=c");
			} else {
				echo '<script>alert("Try again");</script>';
			}
		} else if (isset($_POST['skip'])) {
			$query = mysqli_query(getconn(), "update users set level_2 = ".$_POST['question_id']." where user_id = ".get_id());

			header("location: level_two.php");
		}
		$query = mysqli_query(getconn(), "select * from level_2 where question_id > (select max(level_2) from users where user_id = ".get_id().") limit 1"); //get all questions
		?>

		<!-- Main -->
		<section id="main" class="container">
			<header>
				<h2>Muddy Foundation</h2>
			</header>
			<?php 
			if ($row = mysqli_fetch_array($query)) {
				extract($row);
				?>
				<div class="box">
				<h3>Question</h3>
					<!-- <span class="image featured"><img src="images/pic01.jpg" alt="" /></span> -->
					<p><?php echo $question; ?></p>
					<form action="level_two.php" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input type="hidden" name="question_id" value="<?php echo $question_id; ?>" />
								<input type="text" name="answer" placeholder="Answer" />
							</div>
							<div class="2u 12u$(small)">
								<input type="submit" name="check_question" value="Check" />
							</div>
							<div class="2u 12u$(small)">
								<input type="submit" name="skip" class="button special" value="Give Up" />
							</div>
						</div>
					</form>
				</div>
				<?php 
			} else {
				echo "<div class='box'>You have completed this wall</div>"; 
			}?>

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
	<?php 
	if ($_GET['q'] == 'c') {
		echo '<script>alert("Correct Answer");</script>';
	}
	?>

</body>
</html>
