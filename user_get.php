<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    require_once('db.class.php');

    $user_id = $_SESSION['user_id'];
    $search_name = $_POST['search_name'];

    $db_object = new database();
    $link = $db_object->mysql_connect();

    $sql = " SELECT * FROM users WHERE username LIKE '%$search_name%' AND id != $user_id ";

    $id_result = mysqli_query($link, $sql);

    if($id_result){
        while($user_data = mysqli_fetch_array($id_result, MYSQLI_ASSOC)){
            echo '<a href="#" class="list-group-item">';
                echo '<strong>'.$user_data['username'].'</strong><small> - '.$user_data['email'].'</small>';

                echo '<p class="list-group-item-text pull-right">';
                    echo '<button type="button" class="btn btn-default btn_follow" data-user_id="'.$user_data['id'].'">Follow</button>';
                echo '</p>';

                echo '<div class="clearfix"></div>';
            echo '</a>';
        }
    } else {
        echo 'Erro na consulta de usuários.';
    }
?>
