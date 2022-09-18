<?php include "../db/connection.php";
include "../auth/check_logged_in.php";

$plan_id=$_GET['plan_id'];



$conn->query("delete from `diet-item` where plan_id='$plan_id'");
$conn->query("delete from `diet` where plan_id='$plan_id'");

$_SESSION['msg'] = "Plan deleted successfully.";

header('Location: myplans.php?plan_id='.$plan_id);

?>
