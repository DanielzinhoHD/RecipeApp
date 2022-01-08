<?php
    ini_set("allow_url_fopen", 1);
    $json = file_get_contents("https://www.themealdb.com/api/json/v1/1/random.php");
    $obj = json_decode($json);
    
    $imgURL = $obj->meals[0]->strMealThumb;
?>
<div id="img" style="background-image: url(<?php echo $imgURL ?>);"></div>