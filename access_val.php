<?php

    session_start();

    require_once('db.class.php');

    $user = $_POST['user'];
    $pass = md5($_POST['password']);

    $sql = " SELECT id, username, email FROM users WHERE username = '$user' AND pass = '$pass' ";

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $id_result = mysqli_query($link, $sql);
    if($id_result){
        $user_data = mysqli_fetch_array($id_result);

        if (isset($user_data['username'])){
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            header('Location: home.php');
        } else {
            header('Location: index.php?error=1');
        }
    } else {
        echo 'Erro na execução da consulta.';
    }
?>
