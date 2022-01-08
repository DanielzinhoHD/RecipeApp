<?php

$json = file_get_contents("https://www.themealdb.com/api/json/v1/1/random.php");
$obj = json_decode($json);
$meal = $obj->meals[0];

$mealID = $meal->idMeal;

header("location: ../views/recipe.php?mealID=" . $mealID);
