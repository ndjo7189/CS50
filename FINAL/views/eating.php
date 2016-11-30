<p>Current Weight: <?php 
    if (isset($current_weight)) 
    { 
    echo number_format(''.$current_weight.'',2)
    ;}
    ?>
 lb

<form action="eat.php" method="post">
    <fieldset>
		<div class="group-form">
            <?php
        echo "<select name='food'>";
   
        foreach($positions as $position)
        {
           echo "<option value='".$position["food"]."'>".$position["food"]."</option>";
        }
    echo "</select>";
    ?>
        <br/>
        <br/>
		<div class="group-form">
			<input autofocus class="form-control" name="eatAmount" placeholder="Amount of Consumption" type="text"/>
		</div>
        <br/>
        <div class="group-form">
            <button type="submit" class="btn btn-default">Log Consumption</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>