<?php
include_once("sqlconn.php");
if (isset($_POST['check_question'])) {
	$answer = mysqli_fetch_array(mysqli_query(getconn(), "select answer from level_1 where question_id = ".$_POST['question_id']))[0];
	if($answer == $_POST['answer']) {
		echo '<script>alert("Correct");</script>';
		$query = mysqli_query(getconn(), "update users set level_1 = ".$_POST['question_id']." where user_id = ".get_id());
		header("location: level_one.php");
	} else {
		echo '<script>alert("Try again");</script>';
		header("location: level_one.php");
	}
}
?>