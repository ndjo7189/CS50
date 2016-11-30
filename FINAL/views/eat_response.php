<script>
document.getElementById("bt").className = "active";
</script>
<div style="font-size: larger;">
	<?= "<strong>You have successfully consumed " . $_POST['eatAmount'] . 
	" amount(s) of " . $food . 
	" for a total of " . number_format($total_energy) . " calories!</strong>" ?>
</div>
<br/>
<a href="javascript:history.go(-1);" class="btn btn-default">Go Back</a>
<p>
<p>
<a href="../index.php" class="btn btn-primary">Go to Portfolio</a>