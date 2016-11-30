<script>
document.getElementById("st").className = "active";
</script>
<div style="font-size: larger;">
	<?= "<strong>You have successfully exercised " . $activity . 
	" for " . $_POST['exerciseAmount'] . " minute/s". 
	" to burn a total of " . number_format($total_calorie) . " calories!</strong>" ?>
</div>
<br/>
<a href="javascript:history.go(-1);" class="btn btn-default">Go Back</a>
<p>
<p>
<a href="../index.php" class="btn btn-primary">Go to Portfolio</a>