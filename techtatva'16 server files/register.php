<?php
die();

$response=[];
$response['status']='false';
if(isset($_SESSION['userid']))
	messageAndDie("Hi ".$_SESSION['username'].", please logout before registering a new user.");

//Fields: Name, College, Registration Number, Email, Password, Confirm Password
$fields=['name','college','regno','email', 'password', 'confirmPass'];

foreach ($fields as $key => $value) {
	if(isset($_POST[$value]) && !empty($_POST[$value]))
		;
	else
		messageAndDie("Field $value is empty!");
	if(strlen($_POST[$value])>100)
		messageAndDie("Field $value is longer than 100 characters!");
}

if(strlen($_POST['name'])<5)
	messageAndDie("Name must be at least 5 characters");

if(strlen($_POST['regno'])<5)
	messageAndDie("Registration number must be at least 5 characters");

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	messageAndDie("Email is not valid");

//Password Validation
$password=$_POST['password'];
if(strlen($password) < 6)
	messageAndDie("Password must be at least 6 characters long");
if($password!==$_POST['confirmPass'])
	messageAndDie("The two passwords entered do not match!");
if(!preg_match('@[A-Z]@', $password))
	messageAndDie("Password must have atleast 1 upper case character");
if(!preg_match('@[a-z]@', $password))
	messageAndDie("Password must have atleast 1 lower case character");
if(!preg_match('@[0-9]@', $password))
	messageAndDie("Password must have atleast 1 number");

//User inputs are valid

$host = "localhost";
$username = "root";
$password = "techTatva!6";
$dbname = "registration";
$con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = $con->prepare("SELECT Email FROM users where Email = :email or regno= :regno");
$sql->bindValue(':email',$_POST['email']);
$sql->bindValue(':regno',$_POST['regno']);
$sql->execute();
if($sql->rowCount())
	messageAndDie("This Email ID or Registration Number is already registered!");

$sql = $con->prepare("INSERT INTO users(name,college,regno,email,password) values(:name,:college,:regno,:email,:password)");
$sql->bindValue(':name',$_POST['name']);
$sql->bindValue(':college',$_POST['college']);
$sql->bindValue(':regno',$_POST['regno']);
$sql->bindValue(':email',$_POST['email']);
$sql->bindValue(':password',$_POST['password']);
if($sql->execute())
{
	$response['status']='true';
	messageAndDie("Registration Successful! Please login to continue.");
}
else
	messageAndDie("Some error occured!");

function messageAndDie($msg)
{
	global $response;
	$response['message']=$msg;
	echo json_encode($response);
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TT16 Online Events :: Registration</title>
</head>
<body>

</body>
</html>