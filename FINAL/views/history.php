<p>Current Weight: <?php 
    if (isset($current_weight)) 
    { 
    echo number_format(''.$current_weight.'',2)
    ;}
    ?>
 kg.
<table align="center" class="table table-striped">
        <th style="padding-right:15px">Date</th>
        <th style="padding-right:15px">Weight</th>
        <th style="padding-right:15px">Daily Needs</th>
        <th style="padding-right:15px">Intake</th>
        <th style="padding-right:15px">Output</th>
        <th style="padding-right:15px">Net Calorie</th>
        <th style="padding-right:15px">Net</th>
       <?php
       foreach ($positions as $position)
       {
        ?>
       <tr><td align="left"><?=$position["date"];?></td>
       <td align="left"><?=number_format($position["latest_weight"],2);?></td>
       <td align="left"><?=number_format($position["latest_daily_needs"],2);?></td>
       <td align="left"><?=number_format($position["SUM_intake"],2);?></td>
       <td align="left"><?=number_format($position["SUM_output"],2);?></td>
       <td align="left"><?=number_format($position["Net_calorie"],2);?></td>
       <td align="left"><?=number_format($position["Net"],2);?></td>
       <?php
       }
       ?>
</table> 

