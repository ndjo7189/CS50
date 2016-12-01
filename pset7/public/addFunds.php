<?php
    // configuration
    require("../includes/config.php"); 
    
    $currentCash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// validate submission. If there's an error, show error message and exit out.
        if (empty($_POST["dollars"]))
        {
            apologize("You must choose amount of dollars");
            exit;
        }
        else if (preg_match("/^\d+$/", $_POST["dollars"]) != true)
    	{
    		apologize("You can only add a whole positive number of dollars.");
    		exit;
    	}
    	
        // update database with new cash balance
    	CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["dollars"], $_SESSION["id"]);
    	render("addFunds_response.php", ["title" => "Success", "dollars" => $_POST["dollars"]]);
    }
    
    else
    {
		render("adding.php", ["title" => "Add Funds", "cash" => $currentCash[0]["cash"]]);
    }
?>