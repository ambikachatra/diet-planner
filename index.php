<?php include "connection.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Diet</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="main-content">
            <div class="diets-container">
                <h2><?php  echo "This is from php."; ?></h2>
                <div class="diet-plan">Keto Plan</div>  
                <div class="diet-plan">Keto Plan</div>   
                <div class="diet-plan">Keto Plan</div>                 
            </div>

            <div class="controls-pane">
                <a href="#" class="button add-diet-plan">
                    Add Diet Plan
                </a>
            </div>

        </div>
     

        
    </body>
</html>