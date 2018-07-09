<?php
require __DIR__ . '/../config.php';


$request_uri = strtok(REQUEST_URI, '?');

if (substr($request_uri, 0, 4) === '/api') {
    $endpoint = substr($request_uri, 5);
    if ($endpoint == '') {
        echo 'API v1';
        die();
    }


    $file = ROOT_DIR . substr($request_uri, 1) . '_' . strtolower($_SERVER['REQUEST_METHOD']) . '.php';

    if (!file_exists($file)) {
        header("HTTP/1.0 404 Not Found");
        echo 'Page Not Found';
        die();
    }

    require_once $file;
    die();
}

if ($request_uri == '') {
    header('Location: ' . HOMEPAGE . '/dashboard');
    die();
}

$file = ROOT_DIR . substr($request_uri, 1) . '.php';
if (!file_exists($file)) {
    header("HTTP/1.0 404 Not Found");
    echo '404 Page Not Found';
    die();
}

require_once ROOT_DIR . 'header.php';
require_once $file;
require_once ROOT_DIR . 'footer.php';


