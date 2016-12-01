<?php
      
    require("../includes/config.php");
    
    $rows = CS50::query("SELECT * FROM transactionHistory WHERE user_id = ? ", $_SESSION["id"]); 
    $positions = [];
    foreach($rows as $row)
    {
        $positions [] = [
            "Transaction_Type"=> $row["transactionType"],
            "Date_time"=> $row["transactionDate"],
            "Symbol"=> $row["symbol"],
            "Shares"=> $row["transactionShares"],
            "Share_Price"=>$row["sharePrice"],
            "Total_Price"=>$row["sharePrice"]*$row["transactionShares"],
            ];
    }
    
    render("history_response.php",["title"=> "History", "positions"=> $positions]);
?>