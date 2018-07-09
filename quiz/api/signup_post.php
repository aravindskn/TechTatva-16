<?php

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$cpassword = $_POST['cpassword'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';

if (empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
    error('Empty Fields');
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    error('Invalid Email');
}

if (!preg_match("/^[a-zA-Z ]*$/", $first_name . ' ' . $last_name)) {
    error('Only letters and white spaces are allowed in name');
}

if ($password != $cpassword) {
    error('Passwords don\'t match');
}

$stmt = $pdo->prepare('SELECT 1 FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
if ($stmt->fetchColumn()) {
    error("Email already in use");
}

$password_hash = password_hash($password, PASSWORD_BCRYPT);


$stmt = $pdo->prepare('INSERT INTO users (email,password_hash,first_name,last_name) VALUES(:email,:password_hash,:first_name,:last_name)');
$stmt->execute(['email' => $email, 'password_hash' => $password_hash, 'first_name' => $first_name, 'last_name' => $last_name]);

$_SESSION['user_id'] = $pdo->lastInsertId();

success('SUCCESS', ['redirect' => url('dashboard')]);




