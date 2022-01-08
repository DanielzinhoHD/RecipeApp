<?php

$search;

if(isset($_GET["search"])){
    $search = $_GET["search"];
}else{
    header("location: ../views/index.php");
}

$jsonName = file_get_contents("https://www.themealdb.com/api/json/v1/1/search.php?s=$search");
$objName = json_decode($jsonName);
// $mealName = $objName->meals[0];

$jsonIng = file_get_contents("https://www.themealdb.com/api/json/v1/1/filter.php?i=$search");
$objIng = json_decode($jsonIng);
// $mealIng = $objIng->meals[0];

$jsonCath = file_get_contents("https://www.themealdb.com/api/json/v1/1/filter.php?c=$search");
$objCath = json_decode($jsonCath);
// $mealCath = $objCath->meals[0];

$jsonArea = file_get_contents("https://www.themealdb.com/api/json/v1/1/filter.php?a=$search");
$objArea = json_decode($jsonArea);
// $mealArea = $objArea->meals[0];
