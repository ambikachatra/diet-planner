<?php

$logged_in = false;
$userDetails = NULL;
session_start();

if (isset($_SESSION["token"])) {

    $token = $_SESSION["token"];
    $arr = explode(":", $token);

    $email = $arr[0];
    $hash = $arr[1];

    $query = "select * from user where email='$email' and password='$hash'";
    $result = $conn->query($query);

    
    if ($result == false || $result->num_rows == 0) {
        header('Location: ../login.php');
    } else {

        $logged_in = true;
        $userDetails = $result->fetch_assoc();
    }
} else {
 
            header('Location: ../login.php');
        
  
    
}

?>