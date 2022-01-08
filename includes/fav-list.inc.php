<?php

session_start();

if(isset($_SESSION['id'])){
// User is logged in;

    $userID = $_SESSION['id'];
    $recipeID = $_POST['foodId'];
    $star = $_POST['starClass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(alreadyAdded($conn, $userID, $recipeID) !== false){
    // Remove fav;
        mysqli_query($conn, "DELETE FROM favorites WHERE idAccounts = $userID AND idRecipe = $recipeID;");
        echo "<i class=\"far fa-star\"></i>";
        exit();
    }else{
        // Add fav;
        echo "<i class=\"fas fa-star\"></i>";
    }

    if(addToFavorites($conn, $userID, $recipeID) !== false){
        exit();
    }

}else{
// User is not logged in;
    echo "<script type='javascript'>alert('User must be logged in to add recipes into favorites!');";
    exit();
}