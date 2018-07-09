<?php
require "db.php";
  $sql = "SET @rownum := 0";
$conn->query($sql);

    $sql = "SELECT rank,`uid`,`totalLeft` ,`name`, `score`, `lives`, `outof`, `branch`, `gender`, `avator`, `invite_code`, `invited_code` FROM ( SELECT @rownum := @rownum + 1 AS rank, `uid`, `name`, `score`, `lives`, `outof`, `branch`,`totalLeft` ,`gender`, `avator`, `invite_code`, `invited_code` FROM player_data ORDER BY score DESC ) as result WHERE uid=('$uid')";
    $result = $conn->query($sql);
     $row    = $result->fetch_assoc();

    $arr    = array(
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
    
    
?>