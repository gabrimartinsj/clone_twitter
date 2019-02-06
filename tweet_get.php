<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    require_once('db.class.php');

    $user_id = $_SESSION['user_id'];

    $db_object = new database();
    $link = $db_object->mysql_connect();
    $sql = " SELECT DATE_FORMAT(t.inclusion_date, '%d %b %Y %T') AS format_inclusion_date, t.tweet, u.username FROM tweets AS t JOIN users AS u ON (t.user_id = u.id) WHERE user_id = $user_id ORDER BY inclusion_date DESC ";

    $id_result = mysqli_query($link, $sql);

    if($id_result){
        while($user_data = mysqli_fetch_array($id_result, MYSQLI_ASSOC)){
            echo '<a href="#" class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.$user_data['username'].'<small> - '.$user_data['format_inclusion_date'].'</small></h4>';
                echo '<p class="list-group-item-text">'.$user_data['tweet'].'</p>';
            echo '</a>';
        }
    } else {
        echo 'Erro na consulta de tweets.';
    }
?>
