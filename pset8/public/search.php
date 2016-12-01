<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    
    
    // ensure proper usage
    if (!isset($_GET["geo"]) || strlen($_GET["geo"]) === 0)
    {
        http_response_code(400);
        exit;
    }
    
    // slice up the contents of the GEO query into an array
    $query = explode(" ", $_GET["geo"]);
    
    // prepare the variable that will be fed to the query
    $g = "";
    // loop thru the exploded variable and prepare the variable
    // for the query in such format as "+QueryWord1 +QueryWord2"
    foreach ($query as $geo)
    {
        $g.="+".$geo." ";
    }
    // store the result of the query
    $places = CS50::query("SELECT * FROM places WHERE MATCH (place_name, admin_name1, admin_name2, postal_code) AGAINST (? IN BOOLEAN MODE)", $g);



    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>