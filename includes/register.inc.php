<?php

if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $password2 = $_POST["pwd2"];
    $vkey = md5(time().$name);

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    require_once 'sendemail.inc.php';

    if(emptyInputsRegister($name, $email, $password, $password2) !== false){
        echo "<p class='error'>You need to fill all the inputs!</p>";
        exit();
    }

    if(toShortName($name) !== false){
        echo "<p class='error'>This name is to short!</p>";
        exit();
    }

    if(pwdMatch($password, $password2) !== false){
        echo "<p class='error'>Passwords are different!</p>";
        exit();
    }

    if(invalidEmail($email) !== false){
        echo "<p class='error'>Invalid email!</p>";
        exit();
    }

    if(existingEmail($conn, $email) !== false){
        echo "<p class='error'>Email is alredy being used!</p>";
        exit();
    }

    if(createUser($conn, $name, $email, $password, $vkey) !== false){
    // Send email;
        $to = $email;
        $subject = "Random Recipes - Email Verification";
        $content = "<p>Click the link below to verify your email:</p>
        <a href='https://recipeapp-exercise.herokuapp.com/includes/verify.inc.php?vkey=$vkey'>
            Register account
        </a>";
        // $headers = "From: recipeappexercise@gmail.com" . "\r\n";
        // $headers .= "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        SendEmail::sendMail($to, $subject, $content);
        
        // mail($to, $subject, $message, $headers);
        exit();
    }else{
        exit();
    }
}else{
    echo "<p class='error'>There was an error!</p>";
    exit();
}
?>