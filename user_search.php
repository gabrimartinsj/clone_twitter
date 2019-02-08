<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
    }

    $user_id = $_SESSION['user_id'];

    require_once('db.class.php');

    $db_object = new database();
    $link = $db_object->mysql_connect();

    // Tweet Score //

    $sql = " SELECT COUNT(*) AS tweets_amount FROM tweets WHERE user_id = $user_id ";

    $id_result = mysqli_query($link, $sql);

    $tweets_amount = 0;

    if($id_result){
        $user_data = mysqli_fetch_array($id_result, MYSQLI_ASSOC);
        $tweets_amount = $user_data['tweets_amount'];
    } else {
        echo 'Erro ao executar a consulta.';
    }

    // Follower Score //

    $sql = " SELECT COUNT(*) AS followers_amount FROM followers WHERE user_follow_id = $user_id ";

    $id_result = mysqli_query($link, $sql);

    $followers_amount = 0;

    if($id_result){
        $user_data = mysqli_fetch_array($id_result, MYSQLI_ASSOC);
        $followers_amount = $user_data['followers_amount'];
    } else {
        echo 'Erro ao executar a consulta.';
    }
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Twitter Clone</title>

        <!-- jquery - link cdn -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <!-- bootstrap - link cdn -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script type="text/javascript">
            $(document).ready(function(){

                $('#btn_search').click(function(){
                    if($('#search_name').val().length > 0){
                        $.ajax({
                            url: 'user_get.php',
                            method: 'post',
                            data: $('#search_form').serialize(),
                            success: function(data){
                                $('#users').html(data);

                                $('.btn_follow').click(function(){
                                    var user_follow_id = $(this).data('user_id');

                                    $('#btn_follow_'+user_follow_id).hide();
                                    $('#btn_unfollow_'+user_follow_id).show();

                                    $.ajax({
                                        url: 'follow.php',
                                        method: 'post',
                                        data: { user_follow_id: user_follow_id  },
                                        success: function(data){
                                            alert('Follow feito!');
                                        }
                                    });
                                });

                                $('.btn_unfollow').click(function(){
                                    var user_unfollow_id = $(this).data('user_id');

                                    $('#btn_follow_'+user_unfollow_id).show();
                                    $('#btn_unfollow_'+user_unfollow_id).hide();

                                    $.ajax({
                                        url: 'unfollow.php',
                                        method: 'post',
                                        data: { user_unfollow_id: user_unfollow_id  },
                                        success: function(data){
                                            alert('Unfollow feito!');
                                        }
                                    });
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </head>

    <body>
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="img/twitter.png" />
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php">Voltar</a></li>
                        <li><a href="logoff.php">Sair</a></li>
                    </ul>
                </div> <!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><?= $_SESSION['username'] ?></h4>

                        <hr />

                        <div class="col-md-6">
                            TWEETS <br /> <?= $tweets_amount ?>
                        </div>

                        <div class="col-md-6">
                            FOLLOWERS <br /> <?= $followers_amount ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id='search_form' class="input-group">
                            <input type="text" id='search_name' name='search_name' class="form-control" placeholder="Buscar no Twitter?" maxlength="140" />
                            <span class="input-group-btn">
                                <button id='btn_search' class="btn btn-default" type="button">
                                    Buscar
                                </button>
                            </span>
                        </form>
                    </div>
                </div>

                <div id="users" class="list-group"></div>
            </div>

            <div class="col-md-3">
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
