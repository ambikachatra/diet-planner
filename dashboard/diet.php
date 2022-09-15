<?php include "../db/connection.php";
include "../auth/check_logged_in.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Diet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    
    <link rel="stylesheet" href="style.css">
 
</head>

<body>

    <header>
        <h2>Diet Planner</h2>

        Welcome <?php echo $userDetails["username"];?>
        <nav>
            <a href="../logout.php" class="button logout">Logout </a>
        </nav>

    </header>

    <div class="main-content">

        <div class="diets-container">
       

        <?php 
        $plan_id=$_GET["plan_id"];
        $sql = "SELECT * FROM diet where plan_id='$plan_id'";

        
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            $row=$result->fetch_assoc();
            ?>


            <h2 class="diets-container-heading"><?php echo $row["plan_name"]?></h2>



            <?php
        }

        ?>


        </div>

        <?php include "controlspane.php" ?>

    </div>



</body>

</html>