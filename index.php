<?php
 	$error = isset($_GET['error']) ? $_GET['error'] : 0;

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

		<script>
			$(document).ready(function(){
				// Username and password fields verify
				$('#btn_login').click(function(){
					var null_field = false;

					if($('#user_field').val() == ''){
						$('#user_field').css({'border-color': '#A94442'});
						null_field = true;
					} else {
						$('#user_field').css({'border-color': '#CCC'});
						null_field = false;
					}

					if($('#pass_field').val() == ''){
						$('#pass_field').css({'border-color': '#A94442'});
						null_field = true;
					} else {
						$('#pass_field').css({'border-color': '#CCC'});
						null_field = false;
					}

					if(null_field) return false;
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
	            		<li><a href="register.php">Inscrever-se</a></li>
	            		<li class="<?= $error == 1 ? 'open' : '' ?>">
		            		<a id="enter" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
							<ul class="dropdown-menu" aria-labelledby="enter">
								<div class="col-md-12">
					    			<p>Possui uma conta?</h3>
					    			<br />
									<form method="post" action="access_val.php" id="formLogin">
										<div class="form-group">
											<input type="text" class="form-control" id="user_field" name="user" placeholder="Usuário" />
										</div>

										<div class="form-group">
											<input type="password" class="form-control red" id="pass_field" name="password" placeholder="Senha" />
										</div>

										<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

										<br /><br />
									</form>

									<?php
									 	if($error == 1){
											echo "<font color='#FF0000'> Usuário e/ou senha inválido(s) </font>";
										}
									?>
								</div>
				  			</ul>
	            		</li>
	          		</ul>
	  			</div> <!--/.nav-collapse -->
			</div>
	    </nav>

	    <div class="container">
	    <!-- Main component for a primary marketing message or call to action -->
	    	<div class="jumbotron">
		        <h1>Bem vindo ao twitter clone</h1>
		        <p>Veja o que está acontecendo agora...</p>
	      	</div>

	      	<div class="clearfix"></div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>
