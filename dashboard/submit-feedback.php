<?php include "../db/connection.php";
include "../auth/check_logged_in.php";

$plan_id=$_GET['plan_id'];
$feedback=$_GET['feedback'];
$rating=$_GET['rating'];

$conn->query("INSERT INTO `feedback` (`plan_id`, `username`, `rating`, `feedback`) VALUES ('$plan_id','{$userDetails["username"]}', $rating, '$feedback')");


$_SESSION['msg'] = "Feedback submitted successfully.";

header('Location: diet.php?plan_id='.$plan_id);

?>
