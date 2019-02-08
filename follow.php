<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    require_once('db.class.php');

    $user_id = $_SESSION['user_id'];
    $user_follow_id = $_POST['user_follow_id'];

    if($user_follow_id != '' && $user_id != ''){
        $db_object = new database();
        $link = $db_object->mysql_connect();

        $sql = " INSERT INTO followers(user_id, user_follow_id) VALUES ($user_id, $user_follow_id) ";

        mysqli_query($link, $sql);
    }
?>
