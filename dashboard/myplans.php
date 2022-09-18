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
    <?php include "header.php" ?>

    <div class="main-content">

        <div class="diets-container">
        
            <div class="container-header-group"><h2 class="container-heading">My Diet Plans</h2>
            <a href="add-diet-plan.php" class="button add-diet-plan">
        <span class="material-symbols-outlined">
            add
        </span> 

        <span class="button-text">Add Diet Plan</span>
    </a>
        </div>

            <?php

            $star_filled = file_get_contents("../star_filled.svg");
            $star_unfilled = file_get_contents("../star_unfilled.svg");

            $sql = "SELECT diet.plan_id,diet.plan_name,diet.username,diet.plan_description,rating,feedback FROM diet left outer join feedback on diet.plan_id=feedback.plan_id where diet.username='{$userDetails['username']}' order by rating desc";
            
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {

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
                echo "0 results";
            }
            $conn->close();

            ?>

        </div>

        <?php include "controlspane.php" ?>

    </div>



</body>

</html>