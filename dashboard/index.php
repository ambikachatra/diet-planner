<?php include "../db/connection.php";
include "../auth/check_logged_in.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Diet</title>
   
    <link rel="stylesheet" href="style.css">
 
</head>

<body>


    <?php include "header.php" ?>

    <div class="main-content">

        <div class="diets-container">
            <h2 class="container-heading">Trending Diet Plans</h2>

            <?php

            $star_filled = file_get_contents("../star_filled.svg");
            $star_unfilled = file_get_contents("../star_unfilled.svg");

            $sql = "SELECT diet.plan_id,diet.plan_name,diet.username,diet.plan_description,rating,feedback FROM diet left outer join feedback on diet.plan_id=feedback.plan_id order by rating desc";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
            ?>
                    <a class="diet-plan" href="diet.php?plan_id=<?php echo $row["plan_id"] ?>">
                        <div class="diet-plan-name"><?php echo $row["plan_name"]; ?></div>
                        <div class="diet-plan-author">By <span><?php echo $row["username"]; ?></span></div>
                        <div class="diet-plan-rating">
                            <?php 
                            
                                for($i=0; $i < $row["rating"]; $i++) {
                                    echo $star_filled;        
                                                        }

                                    for($i=0; $i < 5 - $row["rating"]; $i++) {
                                        echo $star_unfilled;                              
                                      }
    
                            ?>
                        </div>
                        <div class="view-details">view details</div>
                    </a>

            <?php
                }
            } else {
                echo "No plans added yet.";
            }
            $conn->close();

            ?>

        </div>

        <?php include "controlspane.php" ?>

    </div>



</body>

</html>