<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['email']);

    header('Location: index.php');
?>
