<table align="center" class="table table-striped">
            <th style="padding-right: 15px">Task_Type</th>
            <th style="padding-right: 15px">Date/Time</th>
            <th style="padding-right: 15px">Task</th>
            <th style="padding-right: 15px">Task_amount</th>
            <th style="padding-right: 15px">Task_total</th>
        <?php 
        foreach ($positions as $position): ?>
            <tr>
                <td align="left"><?= $position["task_type"] ?></td>
                <td align="left"><?= $position["date"] ?></td>
                <td align="left"><?= $position["task"] ?></td>
                <td align="left"><?= $position["task_amount"] ?></td>
                <td align="left"><?= $position["task_total"] ?></td>
            </tr>
        <?php 
        endforeach 
        ?>
</table>

