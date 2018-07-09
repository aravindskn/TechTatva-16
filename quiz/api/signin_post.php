<?php

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if (empty($email) || empty($password)) {
    error('Empty Fields');
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    error('Invalid Email');
}

$stmt = $pdo->prepare('SELECT user_id,password_hash FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password_hash'])) {
    error('Invalid email/password combination');
}

$_SESSION['user_id'] = $user['user_id'];


success('SUCCESS', ['redirect' => url('dashboard')]);


//var_dump($row);


