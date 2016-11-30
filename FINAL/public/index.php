<?php

    // configuration
    require("../includes/config.php"); 

    $rows= CS50::query(
    //Union weight_history and history, putting null when necessary
    "SELECT date, sum(latest_weight), sum(latest_daily_needs), sum(intake), sum(output) 
    FROM
    (
        SELECT 
            DATE_FORMAT(weight_history.date, '%y/%m/%d') AS date, 
            SUM(CASE WHEN weight_history.checker = 'V' THEN weight_history.weight ELSE 0 END) AS latest_weight,
            SUM(CASE WHEN weight_history.checker = 'V' THEN weight_history.daily_needs ELSE 0 END) AS latest_daily_needs,
            NULL as intake,
            NULL as output 
        FROM weight_history
        WHERE weight_history.user_id = ?
        GROUP BY date
        UNION 
        SELECT 
            DATE_FORMAT(history.date, '%y/%m/%d') AS date, 
            NULL as latest_weight,
            NULL as latest_daily_needs,
            SUM(CASE WHEN history.task_type = 'Intake' THEN history.task_total ELSE 0 END) as intake,
            SUM(CASE WHEN history.task_type = 'Output' THEN history.task_total ELSE 0 END) as output
        FROM history
        WHERE history.user_id = ?
        group by date
    ) t
    GROUP BY date desc",
    $_SESSION["id"],$_SESSION["id"]);
    
    $currentWeight = CS50::query("SELECT current_weight FROM users WHERE id = ? ", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row){
        $positions[] = 
        [
            "date" => $row["date"],
            "latest_weight" => $row["sum(latest_weight)"],
            "latest_daily_needs" => $row["sum(latest_daily_needs)"],
            "SUM_intake" => $row["sum(intake)"],
            "SUM_output" => $row["sum(output)"],
            "Net_calorie" => $row["sum(intake)"] - $row["sum(output)"],
            "Net" => $row["sum(latest_daily_needs)"] - ($row["sum(intake)"] - $row["sum(output)"]),

        ];
    }
    render("history.php", ["current_weight" => $currentWeight[0]["current_weight"], "title" => "", "positions" => $positions]);
?>
