<?php

define("ROOT_DIR", dirname(__FILE__) . '/');
define("DIRECTORY", '');
define("HOMEPAGE", 'http://quiz.dev' . DIRECTORY);

$pos = DIRECTORY ? strpos($_SERVER['REQUEST_URI'], DIRECTORY) : 0;
$important = substr($_SERVER['REQUEST_URI'], $pos + strlen(DIRECTORY));
$important = rtrim($important, "/");

define('REQUEST_URI', $important);

require_once "database.php";
session_start();

function isLoggedIn() {
    return (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) ? TRUE : FALSE;
}


// Redirect to the sign in page if the user is not logged in
if (!isLoggedIn()) {
    if (!in_array(REQUEST_URI, ['/signin', '/api/signin', '/api/signup'])) {
        header('Location: ' . HOMEPAGE . '/signin');
        die();
    }
}

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => FALSE,];
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);


function getScore($pdo) {
    $sql = 'SELECT 
count(*) 
FROM answers 
inner join questions ON (answers.question_id=questions.question_id) AND (answers.answer=questions.answer) 
WHERE user_id = :user_id';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $_SESSION['user_id'],]);
    $score = $stmt->fetchColumn() * 10;

    return $score;
}

function error($message = '') {
    http_response_code(400);
    header('Content-Type: application/json');
    $data = [];
    $data['status'] = "FAIL";
    if ($message) {
        $data['message'] = $message;
    }
    echo json_encode($data);
    exit();
}

function success($message = '', $data = NULL) {
    http_response_code(200);
    header('Content-Type: application/json');
    $data = $data ?? array();
    if ($message) {
        $data['message'] = $message;
    }
    $data['status'] = "OK";
    echo json_encode($data);
    exit();
}

function url($path = '') {
    return HOMEPAGE . '/' . $path;
}


function getTitle() {
    $path = substr(strtok(REQUEST_URI, '?'), 1);

    $titles = ['signin' => 'Sign In', 'dashboard' => 'Dashboard', 'quiz' => 'Quiz'];

    if (array_key_exists($path, $titles)) {
        return $titles[$path];
    }

    return '404 Page Not Found';

}