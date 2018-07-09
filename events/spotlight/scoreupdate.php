<?php
$link = mysqli_connect("localhost", "root", "techTatva!6", "alacrity");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
$query = "INSERT INTO `users` WHERE RegistrationNo='".$_SESSION['regno']."' SET score = '$score', ts = CURRENT_TIMESTAMP ON DUPLICATE KEY UPDATE `ts` = if('$score'>score,CURRENT_TIMESTAMP,ts), score = if ('$score'>score, '$score', score);";
?>
    