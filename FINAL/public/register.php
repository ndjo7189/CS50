<?php
    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {     
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
            exit;
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
            exit;
        }
        else if (($_POST["gender"]) != 'Male' || $_POST["gender"] != 'Female')
        {
            apologize("You must provide a gender");
            exit;
        }
        else if (empty($_POST["currentHeight"]) || $_POST["currentHeight"] < 0)
        {
            apologize("You must provide a positive current height");
            exit;
        }
        else if (empty($_POST["currentWeight"]) || $_POST["currentWeight"] < 0)
        {
            apologize("You must provide a positive current height");
            exit;
        }
        // validate the intended username does not already exist in the database
        $rows = CS50::query("INSERT IGNORE INTO users (username, hash, gender, current_height, current_weight) VALUES(?, ?, ?, ?, ?)",
        $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["gender"], $_POST["currentHeight"], $_POST["currentWeight"]);
        if ($rows !== 1)
        {
            render("apology.php", ["message" => "Username already exists"]);
            exit;
        }
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            redirect("index.php");
        }
    }
?>