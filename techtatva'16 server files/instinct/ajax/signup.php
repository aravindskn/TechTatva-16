<?php
require 'db.php';

function UniqueRandomNumbersWithinRange($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    
    $uid      = uniqid();
    $postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
    
    @$email = strtolower($conn->real_escape_string($request->email));
    
    @$pass = $conn->real_escape_string($request->pass);
    @$branch = $conn->real_escape_string($request->branch);
    @$code = $conn->real_escape_string($request->code);
    @$avator = $conn->real_escape_string($request->avator);
    @$name = $conn->real_escape_string($request->name);
    @$gender = $conn->real_escape_string($request->gender);
    @$regno = $conn->real_escape_string($request->regno);
    
    
    
    
    if ($email == null || $pass == null || $branch == null || $avator == null || $name == null || $gender == null || $regno == null) {
        $arr = array(
            'success' => false,
            'type' => "Something's  terribly wrong with your credintials"
        );
        echo json_encode($arr);
        
    } else {
        $sql    = "SELECT * FROM `players_auth` WHERE `name`=('$email');";
        $result = $conn->query($sql);
        
        if (!$result) {
            
            $arr = array(
                'success' => false,
                'type' => "Your Account already exits",
                'error' => 101
            );
            echo json_encode($arr);
            
        } else {
            $sql = "SELECT `uid`, `lives` FROM `player_data` WHERE `regno`=('$code');";
            $result = $conn->query($sql);
            $row    = $result->fetch_assoc();
            if ($result->num_rows == 1) {
                $ui    = $row["uid"];
                $li    = $row["lives"];
                $li    = $li + $pluslivesi;
                $lives = $lives + $pluslivesu;
                $sql   = "UPDATE `player_data` SET `lives`=('$li') WHERE `uid`=('$ui');";
                $conn->query($sql);
                                
            }
            
            
            
            
            $sql = "INSERT INTO `players_auth`(`uid`, `name`, `password`) VALUES ('$uid','$email','$pass')";
            $conn->query($sql);
            $date=getdate();
            $yday=$date["yday"];

            $sql = "INSERT INTO `player_data`(`uid`, `name`, `score`, `lives`, `outof`, `totalLeft`, `branch`, `gender`, `avator`, `invite_code`, `invited_code`, `regno`, `reset_date`) VALUES ('$uid','$name',0,$lives,6,$perday,'$branch','$gender','$avator','$regno','$code','$regno','$yday');";
            
            if (!$conn->query($sql)) {
                $arr = array(
                    'success' => false,
                    'type' => "Your registration number is already taken, go to help for more info"
                );
                
                echo json_encode($arr);
            } else {
                $random = UniqueRandomNumbersWithinRange(1, $max, 6);
                foreach ($random as &$value) {
                    
                    $sql = "INSERT INTO `player_currentquestions`(`uid`, `qid`) VALUES ('$uid','$value')";
                    $conn->query($sql);
                }
                
                
                $sql    = "SELECT * from players_auth";
                $result = $conn->query($sql);
                $rank   = ($result->num_rows);
                $arr    = array(
                    'success' => true,
                    'name' => $name,
                    'score' => 0,
                    'outOf' => 6,
                    'lives' => $lives,
                    'rank' => $rank,
                    'branch' => $branch,
                    'totalLeft' => $perday,
                    'gender' => $gender,
                    'avator' => $avator,
                    'code' => $regno,
                    'id' => $uid,
                    'type' => 'Your Account has been registered go to SignIn page to login'
                );
                
                echo json_encode($arr);
                
            }
        }
    }
}
?>