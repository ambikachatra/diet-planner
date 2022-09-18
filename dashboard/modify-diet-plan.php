<?php include "../db/connection.php";
include "../auth/check_logged_in.php";
include "../utils.php";
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


    $plan_id="";
    if(isset($_GET['plan_id'])) {
        $plan_id=$_GET['plan_id'];
    }

    if (isset($_POST["plan-name"])) {
        $plan_id = $_POST['plan_id'];
        $plan_name = $_POST["plan-name"];
        $plan_description = $_POST["plan-description"];
        $sql = "update diet set plan_name='$plan_name', plan_description='$plan_description' where plan_id='$plan_id'";
        $conn->query($sql);
        session_start();
        $_SESSION['msg'] = 'Plan updated successfully.';
        header("Location: diet.php?plan_id=$plan_id");
    }

    $sql = "select * from diet where plan_id='$plan_id'";
    $rs=$conn->query($sql);

    $row=$rs->fetch_assoc();


    ?>

    <?php include "header.php" ?>

    <div class="main-content">


        <div class="add-diet-container">
            <form  class="crud-form"  action="modify-diet-plan.php" method="POST">
                <input type="hidden" name="plan_id" value="<?php echo $row['plan_id'];?>">
                <div class="input-item">
                    <label for="plan-name">Plan Name</label>
                    <input type="text" value="<?php echo $row['plan_name']?>" name="plan-name" id="plan-name" />
                </div>

                <div class="input-item">
                    <label for="plan-description">Plan Description</label>
                    <textarea name="plan-description" id="plan-description" cols="30" rows="10"><?php echo $row['plan_description']?></textarea>
                </div>

                <button>Modify Diet Plan</button>
            </form>
        </div>


        <?php include "controlspane.php" ?>

    </div>



</body>

</html>