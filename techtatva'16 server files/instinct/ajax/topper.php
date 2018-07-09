<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} else {
    
    
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    
    $sql    = "SELECT `name`, `score`, `branch`, `gender`, `avator` FROM `player_data` order by `score` DESC LIMIT 5";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            
            $emparray[] = $row;
        }
    }
    
}

echo json_encode($emparray);




?>
