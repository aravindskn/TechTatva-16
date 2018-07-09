<?php
$link = mysqli_connect("localhost", "root", "techTatva!6", "alacrity");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
$displayQuery = "SELECT * FROM `users` ORDER by `Score` DESC, ts ASC LIMIT 10";
$result = mysqli_query($link,$displayquery);
    $result_length = mysql_num_rows($result);
for($i = 0; $i < $result_length; $i++)
{
     $rowscala = mysql_fetch_array($result);
     echo $rowscala['Name'] . "\t" . $rowscala['Score'] . $rowscala['Branch']. "\n";
}

?>