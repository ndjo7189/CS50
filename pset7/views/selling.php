<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
        echo number_format(''.$cash.'',2)
    ;} 
    ?>

<form action="sell.php" method="post">
	<fieldset>
		
		<div class="group-form">
               <?php
           echo "<select name='sellStock'>";
           
           foreach($positions as $position)
           {
               echo "<option value='".$position["symbol"]."'>".$position["symbol"]."</option>";
           }
           echo "</select>";
       ?>
		<br/>
		<br/>
		<div class="group-form">
			Amount of shares to sell: <input autofocus class="form-control" name="sellAmount" placeholder="" type="text"/>
		</div>
		<br/>
		<div class="group-form">
			<button type="submit" class="btn btn-default">Sell</button>
			<button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
		</div>
		
	</fieldset>
</form>