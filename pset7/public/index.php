<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    $positions = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
    
    $currentCash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = 
            [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    render("portfolio.php", ["cash" => $currentCash[0]["cash"], "title" => "Portfolio", "positions" => $positions]);
?>


