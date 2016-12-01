<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
        echo number_format(''.$cash.'',2)
    ;} 
    ?>
<p class="text-danger">
    <td><?= htmlspecialchars($stock["name"]) ?><td>
    <td>(<?= htmlspecialchars($stock["symbol"]) ?>)<td>
    <br>
    <td><?= htmlspecialchars($stock["price"]) ?><td>
</p>

<a href="javascript:history.go(-1);" class="btn btn-default">Get Another Quote</a>
<p>
<p>
<a href="../index.php" class="btn btn-primary">Go to Portfolio</a>