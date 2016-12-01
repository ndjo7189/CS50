<p >Current Cash Balance: USD$ <?php 
    if (isset($cash)) 
    { 
        echo number_format(''.$cash.'',2)
    ;}
    ?>
<form action="quote.php" method="post">
    <fieldset>
        <div class="group-form">
            <input class="form-control" type="text" name="symbol" placeholder="Stock Symbol to Lookup" type="text"/>
        </div>
        <br/>
        <div class="group-form">
            <button type="submit" class="btn btn-default">Get Quote</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>



