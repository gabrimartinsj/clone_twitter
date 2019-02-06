<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php?error=1');
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

                $('#btn_tweet').click(function(){
                    if($('#tweet_text').val().length > 0){
                        $.ajax({
                            url: 'tweet_include.php',
                            method: 'post',
                            data: $('#tweet_form').serialize(),
                            success: function(data){
                                $('#tweet_text').val('');
                                tweet_update();
                            }
                        });
                    }
                });

                function tweet_update(){
                    $.ajax({
                        url: 'tweet_get.php',
                        success: function(data){
                            $('#tweets').html(data);
                        }
                    });
                }

                tweet_update();
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
                            TWEETS <br /> 1
                        </div>

                        <div class="col-md-6">
                            FOLLOWERS <br /> 1
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id='tweet_form' class="input-group">
                            <input type="text" id='tweet_text' name='tweet_text' class="form-control" placeholder="O que está acontecendo agora?" maxlength="140" />
                            <span class="input-group-btn">
                                <button id='btn_tweet' class="btn btn-default" type="button">
                                    Tweetar
                                </button>
                            </span>
                        </form>
                    </div>
                </div>

                <div id="tweets" class="list-group"></div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            <a href="#">Buscar</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
