<?php

if(isset($_POST["submit"])){
    
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsLogin($email, $password) !== false){
        echo '<p class=\'error\'>You need to fill all the inputs!</p>';
        exit();
    }

    if(invalidEmail($email) !== false){
        echo '<p class=\'error\'>You need to insert a valid email!</p>';
        exit();
    }

    if(existingEmail($conn, $email) == false){
        echo '<p class=\'error\'>This email doesn\'t exist!</p>';
        exit();
    }

    if(loginUser($conn, $email, $password) !== false){
        exit();
    }else{
        echo '<p class=\'error\'>This account hasn\'t been verified yet!</p>';
        exit();
    }

}else{
    echo '<p class=\'error\'>There was an error!</p>';
    exit();
}