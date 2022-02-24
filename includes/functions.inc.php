<?php

function toShortName($name){
    if(strlen($name) >= 5){
        return false;
    }else{
        return true;
    }
}

function emptyInputsRegister($name, $email, $password, $password2){
    $result;
    if(empty($name) || empty($email) || empty($password) || empty($password2)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputsLogin($email, $password){
    $result;
    if(empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password){
    $userEmail = existingEmail($conn, $email);

    if($userEmail === false){
        // header("location: ../views/loginSignUp.php?error=emaildoesntexist");
        echo '<p class="error">Email doesn\'t exist!</p>';
        exit();
    }

    $verified = $userEmail['verified'];

    if($verified == 1){
    // Login;
        $hashedPwd = $userEmail["password"];
        $checkedPwd = password_verify($password, $hashedPwd);

        if($checkedPwd === false){
            // header("location: ../views/loginSignUp.php?error=wrongpwd");
            echo '<p class="error">Wrong password!</p>';
            exit();
        }else if($checkedPwd === true){
            session_start();
            $_SESSION["id"] = $userEmail["id"];
            $_SESSION["name"] = $userEmail["name"];
            exit();
        }
    }else{
        return false;
    }   
}

function pwdMatch($password, $password2){
    $result;
    if($password !== $password2){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function existingEmail($conn, $email){
    $sql = "SELECT * FROM accounts WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header("location: ../loginSignUp.php?error=stmtfailedemail");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            $result = false;
            return $result;
        }
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password, $vkey){
    $sql = "INSERT INTO accounts (name, email, password, vkey) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header("location: ../loginSignUp.php?error=stmtfailedsignup");
        exit();
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashedPwd, $vkey);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../views/loginSignUp.php?error=none");
        // exit();
        return true;
    }
}

function addToFavorites($conn, $userID, $recipeID){
    $sql = "INSERT INTO favorites (idAccounts, idRecipe) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header("location: ../views/index.php?error=stmtfailedsignup");
        exit();
    }else{

        mysqli_stmt_bind_param($stmt, "ii", $userID, $recipeID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../views/index.php?error=none");
        exit();
    }
}

function alreadyAdded($conn, $userID, $recipeID){
    $sql = "SELECT * FROM favorites WHERE idAccounts = ? AND idRecipe = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header("location: ../views/loginSignUp.php?error=stmtfailedemail");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ii", $userID, $recipeID);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($result)){            
            return true;
        }else{
            return false;
        }
    }
    mysqli_stmt_close($stmt);
}