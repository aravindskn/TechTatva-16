<?php
die();

session_start();
$message="";
if(!isset($_SESSION['userid']))
{
	$message="You are not currently logged in";
}
else
{
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finally, destroy the session.
	session_destroy();
	$message="Logout successful!";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TechTatva 16 Online Events</title>
</head>
<body>
	<h1>TechTatva 16</h1><hr>
	<h2><?php echo $message ?></h2>
	<h3>You will be redirected to Online Events homepage in 5 seconds</h3>
	<script type="text/javascript">
		setTimeout(function(){window.location='index.php'},5*1000);
	</script>
</body>
</html>