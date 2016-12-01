<script>
document.getElementById("st").className = "active";
</script>
<div style="font-size: larger;">
	<?= "<strong>You have successfully sold " . $shares . 
	" share(s) of " . $stock['name'] . 
	" at a price of $".  number_format($stock['price'], 2)  . 
	" per stock for a total of $" . number_format($stock['price'] * $shares, 2) . "!</strong>" ?>
</div>
<br/>
<a href="javascript:history.go(-1);" class="btn btn-default">Go Back</a>
<p>
<p>
<a href="../index.php" class="btn btn-primary">Go Home</a>