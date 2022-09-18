<?php include "../db/connection.php";
include "../auth/check_logged_in.php";

$item_id=$_GET['item_id'];

$plan_id=$_GET['plan_id'];

$conn->query("delete from `diet-item` where item_id=$item_id");

$_SESSION['msg'] = "Item removed successfully.";

header('Location: diet.php?plan_id='.$plan_id);

?>
