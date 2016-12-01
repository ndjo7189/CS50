<?php
    require("../includes/config.php");
    // render form
    $currentCash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $stock["title"] = "Quote";
        render("quote_form.php", ["title" => "Quote", "cash" => $currentCash[0]["cash"]]);
    }
    // if form was posted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Empty Stock");
            exit;
        }     
        $stock = lookup($_POST["symbol"]);
        if ($stock != false)
        {
            render("quote_response.php", ["stock" => $stock, "cash" => $currentCash[0]["cash"]]);
        }
        else
        {
            apologize("Error Getting Stock :(");
            exit;
        }   
    }     
?>