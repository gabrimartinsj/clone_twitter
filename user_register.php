<?php
    require_once('db.class.php');

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $sql = "insert into users(username, email, pass) values ('$user', '$email', '$pass')";

    // Executes the query
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário.';
    }
?>
