<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
    $arr = array(
        'success' => false,
        'type' => "Seems like you've been disconnected to the internet"
        
    );
    
} else {
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    @$uid = $request->uid;
    $sql    = "SELECT `lives`, `outOf`,`totalLeft` FROM `player_data` WHERE `uid`=('$uid')";
    $result = $conn->query($sql);
    $row    = $result->fetch_assoc();
    if ($row["lives"] > 0) {
        $lives     = $row["lives"] - 1;
        $outOf     = $row["outOf"];
        $totalLeft = $row["totalLeft"];
        if ($outOf >= $totalLeft - 6) {
            $many = $totalLeft - $outOf;
            
            $do   = true;
        } else if ($outOf == $totalLeft) {
            $do = false;
        } else {
            $many = 6;
            
            $do   = true;
        }
        $outOf = $outOf + $many;
        if ($do) {
            
            $sql   = "UPDATE `player_data` SET `lives`='$lives',`outof`='$outOf' WHERE `uid`=('$uid');";
            $conn->query($sql);
            $sql = "INSERT INTO `player_donequestions`(`uid`, `qid`) SELECT `uid`, `qid` FROM `player_currentquestions` where `uid`=('$uid');";
            $conn->query($sql);
            $sql = "DELETE FROM `player_currentquestions` WHERE `uid`=('$uid');";
            $conn->query($sql);
            $sql    = "SELECT `qid` FROM `player_donequestions` WHERE `uid`=('$uid');";
            $result = $conn->query($sql);
            $arr    = array();
            $sql    = "";
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
        } else {
            $arr = array(
                'success' => false,
                'type' => "You're out of questions for today come back at 12PM to get some more!!"
                
            );
            echo json_encode($arr);
        }
    } else {
        
        $arr = array(
            'success' => false,
            'type' => "You're out of lives, invite more people to get some!!"
            
        );
        echo json_encode($arr);
        
    }
    
    
    
}





$conn->close();
?>