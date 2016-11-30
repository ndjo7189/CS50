<?php
    // configuration
    require("../includes/config.php");
    
    $currentWeight = CS50::query("SELECT current_weight FROM users WHERE id = ? ", $_SESSION["id"]);
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
       // get a list of activities from exercises database
		$rows = cs50::query("SELECT activity FROM exercises");
		
		// create an array
		$positions = [];
		// store symbol in that array
		foreach ($rows as $row){
			$positions[] = [
				"activity" => $row["activity"]
			];
		}
		
		render("exercising.php", ["title" => "Exercise", "positions" => $positions, "current_weight" => $currentWeight[0]["current_weight"]]);
    }
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// validate submission
        if (empty($_POST["exerciseAmount"])){
        	apologize("You must specify an amount of exercise.");
        	exit;
        }
		else if ($_POST["exerciseAmount"] <= 0){
			apologize("Please provide an amount of exercise greater than 0.");
			exit;
		}
		
		// COUNTER for number of weight records for today 
		$counter = CS50:: query("SELECT COUNT(date) as countDate 
    		FROM weight_history 
    		WHERE DATE_FORMAT(date, '%y/%m/%d') = DATE_FORMAT(NOW(), '%y/%m/%d') AND user_id = ?", 
    		$_SESSION["id"]);
		
		// if there is no weight record for today, we need to update weight history with the last weight on record
		if($counter[0]["countDate"] == 0){
		    // Query to find out the last weight on record
		    $latest_date = CS50::query("SELECT DATE_FORMAT(MAX(date), '%y/%m/%d') AS 'date'
				FROM FINAL.weight_history
				WHERE user_id= ? AND checker= 'v'
				HAVING DATE_FORMAT(MAX(date), '%y/%m/%d') < DATE_FORMAT(NOW(), '%y/%m/%d')",
				$_SESSION["id"]);

			$latest_weight = CS50::query("SELECT *
				FROM FINAL.weight_history
				WHERE user_id= ?
				AND checker= 'v'
				HAVING DATE_FORMAT(date, '%y/%m/%d') = DATE_FORMAT(? , '%y/%m/%d' )", 
	            $_SESSION["id"], $latest_date[0]["date"]);
		    
            // Put a new query for today with the last weight on record
            CS50::query("INSERT INTO weight_history (user_id, date, weight, bmr, daily_needs, checker)
            	VALUES(?, NOW(), ?, ?, ?, 'V')", 
            	$_SESSION["id"], $latest_weight[0]["weight"], $latest_weight[0]["bmr"], $latest_weight[0]["daily_needs"]);
		}
		
		
		$current_weight = CS50::query("SELECT current_weight FROM users WHERE id = ? ", $_SESSION["id"]);
		$calorie = CS50::query("SELECT calorie FROM exercises WHERE activity = ?", $_POST["activity"]);
		$total_calorie = 2.20462 * $calorie[0]["calorie"] * $current_weight[0]["current_weight"] * $_POST["exerciseAmount"];
		
    	// add an entry to history
    	CS50::query("INSERT INTO history (date, user_id, task, task_amount, task_total, task_type) 
    		VALUES(NOW(), ?, ?, ?, ?, 'Output')"
    		, $_SESSION["id"],$_POST["activity"], $_POST["exerciseAmount"], $total_calorie);
    	
    	// render result page
    	render("exercise_response.php", ["title" => "Exercise", "activity" => $_POST["activity"], "exerciseAmount" => $_POST["exerciseAmount"], "total_calorie" => $total_calorie]);
    }
?>