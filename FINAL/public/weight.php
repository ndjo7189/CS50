<?php
    // configuration
    require("../includes/config.php"); 
    
    $currentHeight = CS50::query("SELECT current_height FROM users WHERE id = ? ", $_SESSION["id"]);
    $currentWeight = CS50::query("SELECT current_weight FROM users WHERE id = ? ", $_SESSION["id"]);
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        		// validate submission. If there's an error, show error message and exit out.
        if (empty($_POST["weight"])){
            apologize("You must choose a weight");
            exit;
        }
		else if ($_POST["weight"] <= 0){
			apologize("Please provide an amount of food consumed greater than 0.");
			exit;
		}
		else if (!empty($_POST["height"]) & $_POST["height"] < 100){
			apologize("Please provide a height taller than 100 cm.");
			exit;
		}
		
		// COUNTER 
		$counter = CS50:: query("SELECT COUNT(date) as countDate 
    		FROM weight_history 
    		WHERE DATE_FORMAT(date, '%y/%m/%d') = DATE_FORMAT(NOW(), '%y/%m/%d') AND user_id = ?", 
    		$_SESSION["id"]);
		
		if($counter[0]["countDate"] != 0){
		    CS50::query("UPDATE weight_history 
        	        SET checker = NULL 
    	            WHERE user_id = ? AND DATE_FORMAT(date, '%y/%m/%d') = DATE_FORMAT(NOW(), '%y/%m/%d')", 
    	            $_SESSION["id"]);
		}
		
		$gender = cs50::query("SELECT gender from users where id = ?", $_SESSION["id"]);
		
		// update users database with current_weight
		if(empty($_POST["height"])){
		    CS50::query("UPDATE users SET current_weight = ? WHERE id = ?", $_POST["weight"], $_SESSION["id"]);
		}
		else if(!empty($_POST["height"])){
		 CS50::query("UPDATE users SET current_height = ? AND current_weight = ? WHERE id = ?", $_POST["height"], $_POST["weight"], $_SESSION["id"]);
		}
		
		
		if($gender[0] = "Male"){
    		    
    	    $currentHeight = cs50::query("SELECT current_height FROM users where id = ?", $_SESSION["id"]);
    	    $age = CS50::query("SELECT CAST(DATEDIFF(NOW(), birthday)/365.25 as UNSIGNED) as age FROM users where id=?",$_SESSION["id"]);
        	    
    	    // bmr (male)= 66 + (13.7 X Weight (kg))  + (5 X height) - (6.8 X Age)
    	    $bmr =  66 + (13.7 * $_POST["weight"]) + (5 * $currentHeight[0]["current_height"]) - (6.8 * $age[0]["age"]);
    	    $daily_needs = 1.5 * $bmr;
        	
    	    // Insert query into weight_history
    	    CS50::query(
    	        "INSERT INTO weight_history 
    	        (user_id,date,weight,bmr,daily_needs,checker) 
                VALUES(?, NOW(), ?, ?, ?, 'V')", 
    	        $_SESSION["id"], $_POST["weight"], $bmr, $daily_needs);
    	        
    	    //Render success
    	    render("weight_response.php", ["title" => "Success", "weight" => $_POST["weight"]]);
		}
    		else if($gender[0] = "Female"){

            $age = CS50::query("SELECT CAST(DATEDIFF(NOW(), birthday)/365.25 as UNSIGNED) as age FROM users where id=?",$_SESSION["id"]);
            $currentHeight = cs50::query("SELECT current_height FROM users where id = ?", $_SESSION["id"]);
		    // update users database with current_weight
		    

    	    // bmr (female)= 655 + (9.6 X Weight (kg)) + (1.8 X height) - (4.7 X Age)
    	    $bmr =  655 + (9.6 * $_POST["weight"]) + (1.8 * $currentHeight[0]["current_height"]) - (4.7 * $age[0]["age"]);
    	    $daily_needs = 1.5 * $bmr;
    	
    	    CS50::query(
    	        "INSERT INTO weight_history 
    	        (user_id,date,weight,bmr,daily_needs,checker) 
    	        VALUES(?, NOW(), ?, ?, ?,'V')", 
    	        $_SESSION["id"], $_POST["weight"], $bmr, $daily_needs);
    	        
    	    //Render success
    	    render("weight_response.php", ["title" => "Success", "weight" => $_POST["weight"]]);
    		} 
    }
    else
    {
		render("weighting.php", ["title" => "Log Weight", "current_weight" => $currentWeight[0]["current_weight"],"current_height" => $currentHeight[0]["current_height"]]);
    }
?>