<?php
session_start();


if(isset($_SESSION['id'])){
// User logged in;
    include 'dbh.inc.php';

    $sql = "SELECT * FROM favorites WHERE idAccounts = " . $_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    
// Loop through every user's favorites and returns them into a string;
    if(mysqli_num_rows($result) > 0){
        $rows = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($rows, json_encode($row));
        }
    // Transforms array of objs into a string of array of objs;
        echo '[' . implode(", ", $rows) . ']';
    }else{
    // User has no favorites;
        $rows = array();                        // Added notlogged false, so it can differenciate user is logged, but has no favs;
        array_push($rows, json_encode(json_decode('{"notlogged": false}')));
    // Returning empty object;
        echo '[' . implode(", ", $rows) . ']';
    }
}else{
// User not logged in;
    $rows = array();
    array_push($rows, json_encode(json_decode('{"notlogged": true}')));
// Returning empty object;
    echo '[' . implode(", ", $rows) . ']';
}

