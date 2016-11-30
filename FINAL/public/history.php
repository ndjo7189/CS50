<?php
      
    require("../includes/config.php");
    
    $rows = CS50::query("SELECT * FROM history WHERE user_id = ? ", $_SESSION["id"]); 
    $positions = [];
    foreach($rows as $row)
    {
        $positions [] = [
            "task_type"=> $row["task_type"],
            "date"=> $row["date"],
            "task"=> $row["task"],
            "task_amount"=> $row["task_amount"],
            "task_total"=>$row["task_total"],
            ];
    }
    
    render("history_response.php",["title"=> "History", "positions"=> $positions]);
?>