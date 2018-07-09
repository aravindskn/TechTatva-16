<?php
/**
 * Created by PhpStorm.
 * User: ALPHA-BETA
 * Date: 28-08-16
 * Time: 2:40 AM
 */

unset($_SESSION['user_id']);
header('Location: ' . HOMEPAGE);
die();
