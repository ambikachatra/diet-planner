<?php

    session_start();

    $_SESSION["token"] = "";

    session_destroy();

    header("Location: index.php");
?>