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
        
        if(isset($_POST["item-name"])) {
            $item_id = mt_rand(1000000, 9999999);


                if (isset($_FILES["item-image"]) && $_FILES["item-image"]["size"] != 0) {

                    $path = $_FILES['item-image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $target_dir = "../item-photos/";
                    $target_file = $target_dir . $item_id . "." .$ext;
            
                    if (move_uploaded_file($_FILES["item-image"]["tmp_name"], $target_file)) {
                        $item_image=$item_id . "." . $ext;
                        $item_name=$_POST["item-name"];
                        $item_quantity=$_POST["item-quantity"];
                        $plan_id=$_POST["plan_id"];
                        $sql="insert into `diet-item` values($item_id,'$plan_id','$item_name','$item_image','$item_quantity');";
                        $conn->query($sql);

                        $_SESSION["msg"] = "Item added successfully";

                        header('Location: diet.php?plan_id='.$plan_id);

                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } else {
                    echo "Please select a file to upload.";
                }
        }

    ?>

    <?php include "header.php" ?>

    <div class="main-content">
        
        
        <div class="add-diet-item-container">
            <h2 class="container-heading">Add Diet Item</h2>
        <form class="crud-form" action="add-diet-item.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="plan_id" value="<?php echo $_GET['plan_id'];?>">

            <div class="input-item">
                    <label for="item-name">Item Name</label>
                    <input type="text" name="item-name" id="item-name" />
            </div>

            <div class="input-item">
                    <label for="item-quantity">Item Quantity</label>
                    <input type="number" name="item-quantity" id="item-quantity" />
            </div>

            <div class="input-item">
                    <label for="item-image">Item image</label>
                    <input type="file" name="item-image" id="item-image" />
            </div>

            <button>Add Diet Plan</button>
        </form>
    </div>

    
    <?php include "controlspane.php" ?>

    </div>



</body>

</html>