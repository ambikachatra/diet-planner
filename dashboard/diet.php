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

    <?php

    if (isset($_SESSION["msg"])) {
        echo "<div class=\"info-message\">{$_SESSION["msg"]}</div>";
        unset($_SESSION["msg"]);
    }

    ?>

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

            ?>

                <div class="container-header-group">
                    <h2 class="container-heading"><?php echo $diet_row["plan_name"] ?></h2>


                    <?php
                    if ($diet_row["username"] == $userDetails["username"]) {
                    ?>
                        <div class="button-group">
                            <a href="add-diet-item.php?plan_id=<?php echo $diet_row["plan_id"] ?>" class="button add-diet-plan">
                                <span class="material-symbols-outlined">
                                    add
                                </span>

                                <span class="button-text">Add Item</span>
                            </a>
                            <a href="modify-diet-plan.php?plan_id=<?php echo $diet_row["plan_id"] ?>" class="button add-diet-plan">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>

                                <span class="button-text">Modify</span>
                            </a>

                            <a href="delete-diet-plan.php?plan_id=<?php echo $diet_row["plan_id"] ?>" class="button add-diet-plan">
                                <span class="material-symbols-outlined">
                                    close
                                </span>

                                <span class="button-text">Delete</span>
                            </a>
                        </div>
                    <?php
                    }
                    ?>

                </div>

                <div class="diet-plan-author">
                    By <?php echo $diet_row['username']; ?>
                </div>
                <div class="diet-plan-description">
                    <?php echo $diet_row['plan_description']; ?>
                </div>
                <?php

                if ($diet_items && $diet_items->num_rows > 0) {

                ?>


                    <div class="diet-items-container">


                        <?php

                        while ($row = $diet_items->fetch_assoc()) {
                        ?>
                            <div class="diet-item">
                                <img src="../item-photos/<?php echo $row['item_image'] ?>" alt="" class="diet-item-image">
                                <div class="item-name">
                                    <?php echo $row['item_name']; ?>
                                </div>

                                <div class="item-quantity">
                                    <?php echo $row['item_quantity']; ?>
                                </div>

                                <?php
                                if ($diet_row["username"] == $userDetails["username"]) {
                                ?>
                                    <a href="remove-diet-item.php?item_id=<?php echo $row["item_id"] ?>&plan_id=<?php echo $diet_row["plan_id"]?>" class="button remove-diet-item">
                                        <span class="material-symbols-outlined">
                                            close
                                        </span>
                                        <span class="button-text">Remove Item</span>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>


                    <?php



                    ?>

                    <div class="reviews-container">

                        <div class="reviews-heading">Reviews</div>

                       
                        <?php
                            $sql = "select * from feedback where plan_id='{$diet_row["plan_id"]}' order by id desc";
                            $rs=$conn->query($sql);
                            if($rs && $rs->num_rows > 0) {
                               
                                while($review = $rs->fetch_assoc()) {
                                    ?>
                                          <div class="review">
                                            <div class="review-username"><?php echo $review['username'];?></div>
                
                                            <div class="review-rating">
                                                <?php
                                                for ($i = 0; $i < $review['rating']; $i++)
                                                    echo $star_filled;
                                                ?>
                                            </div>
                
                                            <div class="review-text">
                                            <?php echo $review['feedback'];?>
                                            </div>
                                        </div>
                                        
                                    <?php
                                }

                            } else {
                                echo "<h3>No reviews yet.</h3>";
                            }
                        ?>


                        <?php
                        $sql = "select * from feedback where plan_id='{$diet_row["plan_id"]}' and username='{$userDetails['username']}'";
                        $rs=$conn->query($sql);
                        
                        if ($diet_row["username"] != $userDetails["username"]) {
                            if($rs && $rs->num_rows == 0) {
                        ?>
                            <form action="submit-feedback.php">
                                Leave your feedback.
                                <input type="hidden" name="plan_id" value="<?php echo $diet_row['plan_id'];?>">

                                <textarea name="feedback" id="feedback" cols="30" rows="10"></textarea>
                                <select name="rating" id="">
                                    <option value="1">⭐</option>
                                    <option value="2">⭐⭐</option>
                                    <option value="3">⭐⭐⭐</option>
                                    <option value="4">⭐⭐⭐⭐</option>
                                    <option selected value="5">⭐⭐⭐⭐⭐</option>
                                </select>
                                <button type="submit">Submit Feedback</button>

                            </form>

                        <?php

                        } else {
                            echo "<h3>You've already reviewd this.";
                        }
                    }

                        ?>
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