<?php include "../db/connection.php";
include "../auth/check_logged_in.php";
include "../utils.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Diet</title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    
    <link rel="stylesheet" href="style.css">
 
</head>

<body>

    <?php

        if(isset($_POST["plan-name"])) {
            $plan_name = $_POST["plan-name"];
            $plan_description = $_POST["plan-description"];
            $plan_id=generateRandomString();
            $sql="insert into diet values('$plan_name','{$userDetails['username']}','{$plan_id}','$plan_description');";
            $conn->query($sql);

            $_SESSION['msg'] = 'Plan created successfully.';
            header('Location: myplans.php');
        }

    ?>

    <?php include "header.php" ?>

    <div class="main-content">


    <div class="add-diet-container">
    <h2 class="container-heading">Add Diet Plan</h2>

        <form  class="crud-form"  action="add-diet-plan.php" method="POST">
            <div class="input-item">
                    <label for="plan-name">Plan Name</label>
                    <input type="text" name="plan-name" id="plan-name" />
            </div>

            <div class="input-item">
                    <label for="plan-description">Plan Description</label>
                    <textarea name="plan-description" id="plan-description" cols="30" rows="10"></textarea>
            </div>

            <button>Add Diet Plan</button>
        </form>
    </div>

    
    <?php include "controlspane.php" ?>

    </div>



</body>

</html>