<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
    echo number_format(''.$cash.'',2)
    ;} 
    ?>
<table align="center" class="table table-striped">
        <th style="padding-right:15px">Stock Name</th>
        <th style="padding-right:15px">Stock Symbol</th>
        <th style="padding-right:15px">Amount Owned</th>
        <th style="padding-right:15px">Stock Price</th>
        <th style="padding-right:15px">Stock Value</th>
    <?php
    foreach ($positions as $position)
    {
        $bUrl = "buy.php?symbol=" . $position["symbol"];
        $sUrl = "sell.php?symbol=" . $position["symbol"];
        $hUrl = "history.php?symbol=" . $position['symbol'];
    ?>
       <tr><td align="left"><?=$position["name"  ];?></td>
       <td align="left"><?=$position["symbol"];?></td>
       <td style="padding-right:5em"><?=$position["shares"];?></td>
       <td align="left">$<?=$position["price" ];?></td>
       <td align="left">$<?=number_format($position["shares"] * $position["price"],2)?>
<?php
    }
?>
</table> 