<?php
session_start();

function getconn() {
	return mysqli_connect("localhost", "root", "techTatva!6", "constructure");
}

function is_logged_in() {
	if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
		return true;
	} else {
		return false;
	}
}

function get_id() {
	return $_SESSION['userid'];
}

function get_score() {
	return mysqli_fetch_array(mysqli_query(getconn(), "select score from users where user_id = ".get_id()))[0];
}

function get_answered_ratio($level) {
	$answered = mysqli_fetch_array(mysqli_query(getconn(), "select count(question_id) from has_answered where level = ".$level." and user_id = ".get_id()))[0];
	$total = mysqli_fetch_array(mysqli_query(getconn(), "select count(question_id) from level_".$level))[0];

	return ($answered / $total);
}
?>