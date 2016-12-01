<?php
    // configuration
    require("../includes/config.php");
    
    $currentCash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("buying.php", ["title"=>"Buying Stocks", "cash" => $currentCash[0]["cash"]]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") // $_POST["buyStock"]: Symbol		$_POST["buyAmount"]: amount		$_POST["password"]: password
    {
    	// ensure the stock symbol is in uppercase
    	$_POST["buyStock"] = strtoupper($_POST["buyStock"]);
    	
    	// validate inputs
    	if (empty($_POST["buyStock"]))
    	{
    		apologize("You did not provide a symbol.");
    		exit;
    	}
    	else if (empty($_POST["buyAmount"]))
    	{
    		apologize("You did not provide an amount of shares to buy.");
    		exit;
    	}
    	else if (preg_match("/^\d+$/", $_POST["buyAmount"]) != true)
    	{
    		apologize("You can only buy a whole positive number of shares to buy.");
    		exit;
    	}
    	
    	// a query to get cash held by the user
    	$rows = cs50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    	
    	// get the price of the stock
    	$stock = lookup($_POST["buyStock"]);
    	
    	// is symbol does not exist, error message
    	if ($stock === false)
    	{
    		apologize("You did not provide a legitimate symbol.");
    		exit;
    	}

        if($rows[0]["cash"]> $_POST["buyAmount"] * $stock["price"])
        {
        	// query to update portfolios with new buy amount
        	cs50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?"
        			, $_SESSION["id"], $_POST["buyStock"], $_POST["buyAmount"], $_POST["buyAmount"]);
        			
        	// update database with new cash balance
        	cs50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $_POST["buyAmount"] * $stock["price"], $_SESSION["id"]);
        	
        	// add entry to history
        	cs50::query("INSERT INTO transactionHistory (transactionType, symbol, transactionShares, sharePrice, transactionDate, user_id) VALUES('BUY', ?, ?, ?, NOW(), ?)"
        			, $_POST["buyStock"], $_POST["buyAmount"], $stock["price"], $_SESSION["id"]);

        	// render result page
        	render("buy_response.php", ["title" => "Buy", "stock" => $stock, "shares" => $_POST["buyAmount"]]);
        }
        else
        {
        	apologize("Insufficient funds.");
        	exit;
        }
    }