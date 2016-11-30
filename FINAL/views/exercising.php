<p>Current Weight: <?php 
    if (isset($current_weight)) 
    { 
    echo number_format(''.$current_weight.'',2)
    ;}
    ?>
 lb
 
<form action="exercise.php" method="post">
	<fieldset>
		<div class="group-form">
            <?php
        echo "<select name='activity'>";
       
        foreach($positions as $position)
        {
           echo "<option value='".$position["activity"]."'>".$position["activity"]."</option>";
        }
    echo "</select>";
    ?>
		<br/>
		<br/>
		<div class="group-form">
			<input autofocus class="form-control" name="exerciseAmount" placeholder="Amount of exercise" type="text"/>
		</div>
		<br/>
		<div class="group-form">
            <button type="submit" class="btn btn-default">Log Activity</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
	</fieldset>
</form>