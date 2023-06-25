<?php
    session_start();
    unset($_SESSION['a_email']);
    session_destroy();

    header("Location: index.php");
    exit;
?>
