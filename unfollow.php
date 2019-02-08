<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    require_once('db.class.php');

    $user_id = $_SESSION['user_id'];
    $user_unfollow_id = $_POST['user_unfollow_id'];

    if($user_unfollow_id != '' && $user_id != ''){
        $db_object = new database();
        $link = $db_object->mysql_connect();

        $sql = " DELETE FROM followers WHERE user_id = $user_id AND user_follow_id = $user_unfollow_id ";

        mysqli_query($link, $sql);
    }
?>
