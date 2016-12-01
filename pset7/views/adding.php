<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
        echo number_format(''.$cash.'',2)
    ;} 
    ?>

<form action="addFunds.php" method="post">
    <fieldset>
        <div class="form-group">
            Dollars to add: <input autofocus class="form-control" name="dollars" placeholder="" type="int"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Add Funds</button>
        </div>
    </fieldset>
</form>