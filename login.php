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
        
        $email=$_POST["email"];
        $password=$_POST["password"];

        $hashed=md5($password);

        $query="select email from user where email='%s' and password='%s'";
        $sql=sprintf($query, $email, $hashed);

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["token"]="$email:$hashed";


            header("Location: dashboard");

            exit(0);

        } else {
            echo "Login failed";
        }

        $conn->close();

        
    }
    
    ?>

    <div class="main-content">

    <form action="login.php" method="POST">


        <?php 
        
        if(isset($_SESSION["msg"])) {
            echo "<div class=\"info-message\">{$_SESSION["msg"]}</div>";
            unset($_SESSION["msg"]);
        }

        ?>

        

        <div class="form-header">Login</div>

        <div class="input-group">
            <label for="email">email</label>
            <input type="email" name="email" />
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" />
        </div>

        <div class="input-group">
            <button type="submit">Login</button>
        </div>
    </form>

    </div>
</body>
</html>