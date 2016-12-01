<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
        echo number_format(''.$cash.'',2)
    ;} 
    ?>
<script>
document.getElementById("bt").className = "active";
</script>
<form action="buy.php" method="post">
    <fieldset>
		<div class="form-group">
			Symbol of company to buy: <input autofocus class="form-control" name="buyStock" placeholder="" type="text"/>
		</div>
        <br/>
		<div class="form-group">
			Amount of shares to buy: <input class="form-control" name="buyAmount" placeholder="" type="text"/>
		</div>
        <br/>
        <div class="group-form">
            <button type="submit" class="btn btn-default">Buy Stock</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>