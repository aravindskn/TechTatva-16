<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} else {
    
    
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    @$uid = $request->uid;
    
    $sql    = "SELECT `reset_date` FROM `player_data` WHERE `uid`=('$uid');";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
    $ydayt  = $row["reset_date"];
    $date   = getdate();
    $ydayn  = $date["yday"];
    if ($ydayn > $ydayt) {
        $sql = "UPDATE `player_data` SET `reset_date`=('$ydayn'), `outOf`=(6), `totalLeft`=('$perday') WHERE `uid`=('$uid');  ";
        $conn->query($sql);
        $sql = "INSERT INTO `player_donequestions`(`uid`, `qid`) SELECT `uid`, `qid` FROM `player_currentquestions` where `uid`=('$uid');";
        $conn->query($sql);
        $sql = "DELETE FROM `player_currentquestions` WHERE `uid`=('$uid');";
        $conn->query($sql);
        $sql    = "SELECT `qid` FROM `player_donequestions` WHERE `uid`=('$uid');";
        $result = $conn->query($sql);
        $arr    = array();
        $sql    = "";
        $many=6;
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row["qid"]; // Inside while loop
        }
        for ($j = 0; $j < $many; $j++) {
            $notFound = true;
            while ($notFound) {
                $n = rand(1, $max);
                
                for ($i = 0; $i < count($arr); $i++) {
                    if ($arr[$i] == $n) {
                        $notFound = true;
                        break;
                    } else {
                        $notFound = false;
                        continue;
                    }
                    
                }
                
            }
            $arr[] = $n;
            
            $sql = "INSERT INTO `player_currentquestions`(`uid`, `qid`) VALUES ('$uid','$n');";
            $conn->query($sql);
        }
        include "update.php";
        
        echo json_encode($arr);
    }
    else{
        $arr=array(
            'success' => false,
            'type'=>"Comeback after 12 AM to get more questions"
        );
        echo json_encode($arr);
    }
}



?>