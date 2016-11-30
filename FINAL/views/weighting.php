<p>Latest Height in Record: <?php 
    if (isset($current_height)) 
    { 
    echo number_format(''.$current_height.'',1)

    ;}
    ?>
 cm.
 
<p> Latest Height in Record: <?php 
    if (isset($current_weight)) 
    { 
    echo number_format(''.$current_weight.'',1)
    ;}
    ?>
 kg.

<form action="weight.php" method="post">
    <fieldset>
        <div class="group-form">
            <input autofocus class="form-control" name="height" placeholder="Current Height (in cm)" type="int"/>
        </div>
        <br/>
        <div class="group-form">
            <input autofocus class="form-control" name="weight" placeholder="Current Weight (in kg)" type="int"/>
        </div>
        <br/>
        <div class="group-form">
            <button type="submit" class="btn btn-default">Log Weight</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>