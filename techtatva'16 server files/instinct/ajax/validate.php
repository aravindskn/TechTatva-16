<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} else {
    
    
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    @$uid = $request->uid;
    @$answer = $request->answer;
    @$qid = $request->qid;
    
    $sql    = "SELECT * FROM `player_currentquestions` WHERE `qid`=('$qid') AND `uid`=('$uid')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        $sql    = "SELECT * FROM `questions` WHERE `qid`=('$qid') and `answer`=('$answer')";
        $result = $conn->query($sql);
        $ans="";
        if ($result->num_rows > 0) {
            
            $sql    = "UPDATE `player_data` SET `score`=`score`+1 WHERE `uid`=('$uid')";
            $result = $conn->query($sql);
            $ans="Yep, you've got it right!!";
            
        } else {
            
            $sql    = "UPDATE `player_data` SET  `score`=`score`-1 WHERE `uid`=('$uid')";
            $result = $conn->query($sql);
            $ans="Oops, you've got it wrong!!";
        }
        $sql = "INSERT INTO `player_donequestions`(`uid`, `qid`) VALUES('$uid','$qid');";
        $conn->query($sql);
        $sql="DELETE FROM `player_currentquestions` WHERE `uid`=('$uid') AND `qid`=('$qid');";
        $conn->query($sql);
        $sql    = "SELECT `lives`, `outOf`,`totalLeft` FROM `player_data` WHERE `uid`=('$uid')";
        $result = $conn->query($sql);
        $row    = $result->fetch_assoc();
        if ($row["totalLeft"]-6 > $row["outOf"]) {
           
            $arr    = array();
            $sql    = "SELECT `qid` FROM `player_currentquestions` WHERE `uid`=('$uid')";
            $result = $conn->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["qid"]; // Inside while loop
            }
            $sql    = "SELECT `qid` FROM `player_donequestions` WHERE `uid`=('$uid')";
            $result = $conn->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["qid"]; // Inside while loop
            }
            if (count($arr) <= $max) {
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
             $sql="UPDATE `player_data` SET `outOf`=`outOf`+1 WHERE `uid`=('$uid');";
             $conn->query($sql);   
             $sql = "INSERT INTO `player_currentquestions`(`uid`, `qid`) VALUES('$uid','$n');";
             $conn->query($sql);
                include 'update.php';
                $arr["answer"]=$ans;
                echo json_encode($arr);
            } else {
                $arr = array(
                    'success' => false,
                    'type' => "Seems like you've reached to the end of the game"
                );
                echo json_encode($arr);
            }
        } else {
            
            $arr = array(
                'success' => false,
                'type' => "No more new questions will be given today",
                'error' => 101,
                'answer'=>$ans
            );
            $sql="UPDATE `player_data` SET `outOf`=`outOf`+1 WHERE `uid`=('$uid');";
            $conn->query($sql);
            $sql = "SET @rownum := 0";
            $conn->query($sql);
            
            $sql    = "SELECT rank,`uid`,`totalLeft` ,`name`, `score`, `lives`, `outof`, `branch`, `gender`, `avator`, `invite_code`, `invited_code` FROM ( SELECT @rownum := @rownum + 1 AS rank, `uid`, `name`, `score`, `lives`, `outof`, `branch`,`totalLeft` ,`gender`, `avator`, `invite_code`, `invited_code` FROM player_data ORDER BY score DESC ) as result WHERE uid=('$uid')";
            $result = $conn->query($sql);
            $row    = $result->fetch_assoc();
            
            $new         = array(
                'success' => true,
                'name' => $row["name"],
                'score' => $row["score"],
                'outOf' => $row["outof"],
                'lives' => $row["lives"],
                'rank' => $row["rank"],
                'branch' => $row["branch"],
                'totalLeft' => $row["totalLeft"],
                'gender' => $row["gender"],
                'avator' => $row["avator"],
                'code' => $row["invite_code"],
                'id' => $uid
            );
            $arr["user"] = $new;
            echo json_encode($arr);
        } // for no more new questions
    } else {
        $arr = array(
            'success' => false,
            'type' => "Seems like you've already answered the question "
        );
        echo json_encode($arr);
    }
    
}


$conn->close();
?>
