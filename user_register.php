<?php
    require_once('db.class.php');

    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $user_exists = false;
    $email_exists = false;

    $sql = " select * from users where username = '$user'";
    if($id_result = mysqli_query($link, $sql)){
        $user_data = mysqli_fetch_array($id_result);

        if(isset($user_data['username'])){
            $user_exists = true;
        }
    } else {
        echo 'Erro ao tentar localizar o registro de usuário.';
    }

    $sql = " select * from users where email = '$email'";
    if($id_result = mysqli_query($link, $sql)){
        $user_data = mysqli_fetch_array($id_result);

        if(isset($user_data['email'])){
            $email_exists = true;
        }
    } else {
        echo 'Erro ao tentar localizar o registro de usuário.';
    }

    if($user_exists || $email_exists){
        $return_get = '';

        if($user_exists) $return_get .= "error_user=1&";
        if($email_exists) $return_get .= "error_email=1&";

        header('Location: register.php?'.$return_get);
        die();
    }

    $sql = "insert into users(username, email, pass) values ('$user', '$email', '$pass')";

    // Executes the query
    if(mysqli_query($link, $sql)){
        echo 'Usuário registrado com sucesso!';
    } else {
        echo 'Erro ao registrar o usuário.';
    }
?>
