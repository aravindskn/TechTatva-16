<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    @$uid = $request->uid;
    
    if ($uid != null) {
        $sql    = "SELECT `uid`, `qid` FROM `player_currentquestions` WHERE `uid`=('$uid');";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $arr=array('success'=> true);
            $emparray = array();
            $sql      = "SELECT `qid`, `question`, `option1`, `option2`  FROM `questions` WHERE `qid` IN (SELECT  `qid` FROM `player_currentquestions` WHERE `uid`=('$uid'))";
            $result   = $conn->query($sql);
            $count=$result->num_rows;
            while ($row = $result->fetch_assoc()) {
                
                $emparray[] = $row;
            }
            $arr["questions"]=$emparray;
            if ($count>0) {
                echo json_encode($arr);
            } else {
                $arr = array(
                    'success' => false,
                    'type' => "You've reached to the end of the game for today",
                    'error'=> 102
                );
                echo json_encode($arr);
            }
        } else {
            $arr = array(
                'success' => false,
                'type' => "You've reached to the end of the game for today",
                'error'=> 102
            );
            echo json_encode($arr);
        }
        
    } else {
        $arr = array(
            'success' => false,
            
            'error' => 101
        );
        echo json_encode($arr);
    }
}
?>