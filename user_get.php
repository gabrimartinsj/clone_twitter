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

    $sql = " SELECT u.*, f.* FROM users AS u LEFT JOIN followers as f ON (f.user_id = $user_id AND u.id = f.user_follow_id) WHERE u.username LIKE '%$search_name%' AND u.id != $user_id ";

    $id_result = mysqli_query($link, $sql);

    if($id_result){
        while($user_data = mysqli_fetch_array($id_result, MYSQLI_ASSOC)){
            echo '<a href="#" class="list-group-item">';
                echo '<strong>'.$user_data['username'].'</strong><small> - '.$user_data['email'].'</small>';

                echo '<p class="list-group-item-text pull-right">';
                    $following = isset($user_data['user_follow_id']) && !empty($user_data['user_follow_id']) ? 'S' : 'N';

                    $btn_follow_display = 'block';
                    $btn_unfollow_display = 'block';

                    if($following == 'N'){
                        $btn_unfollow_display = 'none';
                    } else {
                        $btn_follow_display = 'none';
                    }

                    echo '<button type="button" id="btn_follow_'.$user_data['id'].'" class="btn btn-default btn_follow" style="display:'.$btn_follow_display.'" data-user_id="'.$user_data['id'].'">Follow</button>';

                    echo '<button type="button" id="btn_unfollow_'.$user_data['id'].'" class="btn btn-primary btn_unfollow" style="display:'.$btn_unfollow_display.'" data-user_id="'.$user_data['id'].'">Unfollow</button>';
                echo '</p>';

                echo '<div class="clearfix"></div>';
            echo '</a>';
        }
    } else {
        echo 'Erro na consulta de usuários.';
    }
?>
