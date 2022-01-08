<?php

session_start();

if(isset($_POST)){

    $userID = $_SESSION['id'];
    $recipeID = $_POST['foodId'];
    $star = $_POST['starClass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if($star === 'far fa-star'){
        echo "Remove from favorites <i class=\"fas fa-star\"></i>";
    }else{
        echo "Add to favorites <i class=\"far fa-star\"></i>";
    }

    if(alreadyAdded($conn, $userID, $recipeID) !== false){
        // Remove fav;
        mysqli_query($conn, "DELETE FROM favorites WHERE idAccounts = $userID AND idRecipe = $recipeID;");
        exit();
    }

    if(addToFavorites($conn, $userID, $recipeID) !== false){
        // header("location: ../views/index.php?error=errortoadd");
        exit();
    }

}else{
    // header("location: ../views/index.php");
    exit();
}