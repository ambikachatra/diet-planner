<?php include "db/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>


    <?php
    session_start();
    
    
    if(isset($_POST["email"])) {
        
        $fullname=$_POST["fullname"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];

        $hashed=md5($password);

        $query="INSERT INTO `user`(`username`, `fullname`, `email`, `password`) VALUES ('%s','%s','%s','%s')";
        $sql=sprintf($query, $username, $fullname, $email, $hashed);

        $conn->query($sql);

          
        $_SESSION["msg"]="Registration successful.";
        header("Location: login.php");

          
        $conn->close();

        
    }


    
    ?>

    <div class="main-content">

    <form action="register.php" method="POST">

    <div class="form-header">Register</div>
    <div class="input-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" />
        </div>


        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" />
        </div>

        <div class="input-group">
            <label for="email">email</label>
            <input type="email" name="email" />
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" />
        </div>

        <div class="input-group">
            <button type="submit">Register</button>
        </div>
    </form>

    </div>
</body>
</html>