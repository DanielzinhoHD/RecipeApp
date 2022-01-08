<?php

if(isset($_GET['vkey'])){

    include '../includes/dbh.inc.php';

// Process verification;
    $vkey = $_GET['vkey'];
    $sql = "SELECT verified, vkey FROM accounts WHERE verified = 0 AND vkey = ? LIMIT 1;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../views/loginSignUp.php?signup");
        exit();
    }else{

        mysqli_stmt_bind_param($stmt, "s", $vkey);
        mysqli_stmt_execute($stmt);
        

        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

    // Checks if there is an account able to be verified;
        if(mysqli_num_rows($result) == 1){
        // Verify;
            $update = mysqli_query($conn, "UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
    
            if($update){
                header("location: ../views/verification-successful.php");
            }else{
                header("location: ../views/index.php");
            }
        }else{
            // echo mysqli_num_rows($result);
            header("location: ../views/index.php");
        }
    }
}else{
    header("location: ../views/index.php?nokey");
}

