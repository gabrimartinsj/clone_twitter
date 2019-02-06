<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    require_once('db.class.php');

    $tweet_text = $_POST['tweet_text'];
    $user_id = $_SESSION['user_id'];

    if($tweet_text != '' && $user_id != ''){
        $db_object = new database();
        $link = $db_object->mysql_connect();
        $sql = " INSERT INTO tweets(user_id, tweet) VALUES ('$user_id', '$tweet_text') ";

        mysqli_query($link, $sql);
    }
?>
