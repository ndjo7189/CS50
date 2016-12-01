<?php
    // configuration
    require("../includes/config.php");
    
    $currentCash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       // get a list of shares currently held from database
		$rows = cs50::query("SELECT * FROM portfolios WHERE user_id = ?", $_SESSION["id"]);
				
		// create an array
		$positions = [];
		// store symbol in that array
		foreach ($rows as $row)
		{
			$stocks = cs50::query("SELECT symbol FROM transactionHistory WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $row["symbol"]);
			$stock = $stocks[0];
			if ($stock !== false)
			{
				$positions[] = [
					"symbol" => $row["symbol"]
				];
			}
		}
		render("selling.php", ["title" => "Sell", "positions" => $positions, "cash" => $currentCash[0]["cash"]]);
    }
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	// query to check amount of shares held by the user
		$rows = cs50::query("SELECT * FROM portfolios WHERE user_id = ? and symbol = ?", $_SESSION["id"], $_POST["sellStock"]);
		
		// validate submission
        if (empty($_POST["sellAmount"]))
        {
        	apologize("You must specify an amount to sell.");
        	exit;
        }
		else if ($_POST["sellAmount"] > $rows[0]["shares"])
		{
			apologize("You do not have " . $_POST["sellAmount"] . " shares of " . $_POST["sellStock"] . " to sell.");
			exit;
		}
		else if ($_POST["sellAmount"] <= 0)
		{
			apologize("Please provide an amount of shares greater than 0.");
			exit;
		}
		
		// get the price of the stock
		$stock = lookup($_POST["sellStock"]);
		
        $shares = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? && symbol = ?", $_SESSION["id"], $_POST["sellStock"]);
        $shares = intval($shares[0]['shares']);
        // if sell amount is less or equal to the number of shares held, go ahead with the process
        if($_POST["sellAmount"] <= $shares)
        {
        	// delete shares from database
        	cs50::query("UPDATE portfolios SET shares = shares - ? WHERE user_id = ? AND symbol = ?", $_POST["sellAmount"], $_SESSION["id"], $_POST["sellStock"]);
        	
        	// update database with new cash balance
        	cs50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["sellAmount"] * $stock["price"], $_SESSION["id"]);
        	
        	// if all shares were sold, delete the share from the table
        	if ($rows[0]["shares"] == $_POST["sellAmount"])
        	{
        		cs50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["sellStock"]);
        	}
        	
        	// add an entry to history
        	CS50::query("INSERT INTO transactionHistory (transactionType, symbol, transactionShares, sharePrice, transactionDate, user_id) VALUES('SELL', ?, ?, ?, NOW(), ?)"
        	, $_POST["sellStock"], $_POST["sellAmount"], $stock["price"], $_SESSION["id"]);
        	
        	// render result page
        	render("sell_response.php", ["title" => "Sell", "stock" => $stock, "shares" => $_POST["sellAmount"]]);
		}
    }
?>