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

    <?php include "header.php"; ?>

    <div class="main-content">

        <div class="diets-container">


            <?php

            $star_filled = file_get_contents("../star_filled.svg");
            $star_unfilled = file_get_contents("../star_unfilled.svg");


            $plan_id = $_GET["plan_id"];
            $sql = "SELECT * FROM `diet` where plan_id='$plan_id'";

            $diet = $conn->query($sql);


            if ($diet && $diet->num_rows > 0) {
                $diet_row = $diet->fetch_assoc();

                $sql = "SELECT * FROM `diet-item` where plan_id='$plan_id'";

                $diet_items = $conn->query($sql);

                if ($diet_items && $diet_items->num_rows > 0) {
            ?>


                    <h2 class="diets-container-heading"><?php echo $diet_row["plan_name"] ?></h2>

                    <div class="diet-plan-author">
                        By <?php echo $diet_row['username'];?>
                    </div>
                    <div class="diet-plan-description">
                        <?php echo $diet_row['plan_description'];?>
                    </div>

                    <div class="diet-items-container">
                        

                    <?php 
                    
                    while($row = $diet_items->fetch_assoc()) {
                        ?>
                            <div class="diet-item">
                                <img src="../item-photos/<?php echo $row['item_image']?>" alt="" class="diet-item-image">
                                <div class="item-name">
                                    <?php echo $row['item_name']; ?>
                                </div>

                                <div class="item-quantity">
                                    <?php echo $row['item_quantity']; ?>
                                </div>
                            </div>
                        <?php
                    }
                    ?>

                </div>

                <div class="reviews-container">

                    <div class="reviews-heading">Reviews</div>

                    <div class="review">
                        <div class="review-username">Demo User</div>
                    </div>

                    <div class="review-rating">
                        <?php
                        for($i=0; $i < 5; $i++) 
                            echo $star_filled; 
                        ?>
                    </div>

                    <div class="review-text">
                        very nice diet plan.
                    </div>


                    <form action="review">

                    <textarea name="review" id="" cols="30" rows="10"></textarea>

                    <button type="submit">Submit Feedback</button>

                    </form>

                </div>

            <?php
                }
            }
            ?>


        </div>

        <?php include "controlspane.php" ?>

    </div>



</body>

</html>