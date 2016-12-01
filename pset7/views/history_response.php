<table align="center" class="table table-striped">
            <th style="padding-right: 15px">Transaction_Type</th>
            <th style="padding-right: 15px">Date/Time</th>
            <th style="padding-right: 15px">Symbol</th>
            <th style="padding-right: 15px">Shares</th>
            <th style="padding-right: 15px">Share_Price</th>
            <th style="padding-right: 15px">Total_Price</th>
        <?php 
        foreach ($positions as $position): ?>
            <tr>
                <td align="left"><?= $position["Transaction_Type"] ?></td>
                <td align="left"><?= $position["Date_time"] ?></td>
                <td align="left"><?= $position["Symbol"] ?></td>
                <td align="left"><?= $position["Shares"] ?></td>
                <td align="left"><?= $position["Share_Price"] ?></td>
                <td align="left"><?= $position["Total_Price"] ?></td>
            </tr>
        <?php 
        endforeach 
        ?>
</table>

