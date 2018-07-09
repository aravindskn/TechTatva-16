<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} else {
    
    
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    
    @$safe_email = strtolower($conn->real_escape_string($request->email));
    @$safe_password = $conn->real_escape_string($request->pass);
    

    
    
    if ($safe_email == null || $safe_password == null) {
        $arr = array(
            'success' => false,
            'type' => 'Something is terribly wrong with your credintials'
        );
        echo json_encode($arr);
        
    } else {
        
        $sql    = "SELECT `uid`, `password` FROM `players_auth` where `name`= ('$safe_email');";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            if ($row["password"] == $safe_password) {
                $uid = $row["uid"];
                $conn->query("SET @rownum := 0");
                
                $sql = "SELECT rank,`uid`,`totalLeft` ,`name`, `score`, `lives`, `outof`, `branch`, `gender`, `avator`, `invite_code`, `invited_code` FROM ( SELECT @rownum := @rownum + 1 AS rank, `uid`, `name`, `score`, `lives`, `outof`, `branch`,`totalLeft` ,`gender`, `avator`, `invite_code`, `invited_code` FROM player_data ORDER BY score DESC ) as result WHERE uid=('$uid')";
                
                
                $result = $conn->query($sql);
                
                
                $row = $result->fetch_assoc();
                
                
                
                $arr = array(
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
                
                echo json_encode($arr);
                
                
            } else {
                $arr = array(
                    'success' => false,
                    'type' => 'Your password is incorrect'
                );
                echo json_encode($arr);
            }
        } else {
            $arr = array(
                'success' => false,
                'type' => 'Your email is not registered'
            );
            echo json_encode($arr);
        }
        
        $conn->close();
        
    }
}
?>
