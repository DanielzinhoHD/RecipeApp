<?php

$meal;
getFoodById();

function getFoodById(){
    global $meal;

    $mealID = $_GET['mealID'];
    $json = file_get_contents("https://www.themealdb.com/api/json/v1/1/lookup.php?i=" . $mealID);
    $obj = json_decode($json);
    $meal = $obj->meals[0];

    return $meal;
}

function getFoodID($meal){
    return $meal->idMeal;
}

function getFoodName($meal){
    return $meal->strMeal;
}

function getFoodIMG($meal){
    return $meal->strMealThumb;
}

function getFoodInstructions($meal){
    $string = $meal->strInstructions;
    $inst = str_replace('. ', '.</br>', $string);
    return $inst;
}

function getFoodIngredients($meal){
    $array = STDtoArray($meal);
    $ing = array();
    $measure = array();
    $result = array();

    foreach($array as $key => $value){
        if(strpos($key, "strIngredient") !== false){
            $capValue = ucfirst($value);
            array_push($ing, $capValue);
        }
    }

    foreach($array as $key => $value){
        if(strpos($key, "strMeasure") !== false){
            array_push($measure, $value);
        }
    }

    foreach($ing as $key => $value){
        if($value){
            if($measure[$key]){
                array_push($result, $value . ', ' . $measure[$key]);
            }else{
                array_push($result, $value);
            }
        }
    }
    
    sort($result);

    foreach($result as $value){
        echo "<p>$value</p>";
    }
}

function getYoutubeLink($meal){
    if($meal->strYoutube){
        return $meal->strYoutube;
    }else{
        return false;
    }
}

function STDtoArray($std){
    return json_decode(json_encode($std), true);
}

function arrayToString($array){
    return json_encode($array);
}