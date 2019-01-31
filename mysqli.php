<?php

    require_once('db.class.php');

    $sql = "SELECT * FROM users";

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $id_result = mysqli_query($link, $sql);
    if($id_result){
        $user_data = array();
        while ($line = mysqli_fetch_array($id_result, MYSQLI_ASSOC)){
            $user_data[] = $line;
        }

        foreach($user_data as $user){
            echo($user['email']);
            echo '<br /> <br />';
        }
    } else {
        echo 'Erro na execução da consulta.';
    }
?>
