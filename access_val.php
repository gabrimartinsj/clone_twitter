<?php
    require_once('db.class.php');

    $user = $_POST['user'];
    $pass = $_POST['password'];

    $sql = " SELECT * FROM users WHERE username = '$user' AND pass = '$pass' ";

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $id_result = mysqli_query($link, $sql);
    if($id_result){
        $user_data = mysqli_fetch_array($id_result);

        if (isset($user_data['user'])){
            echo 'Login realizado!';
        } else {
            header('Location: index.php?error=1');
        }
    } else {
        echo 'Erro na execução da consulta.';
    }
?>
