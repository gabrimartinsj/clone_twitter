<?php
	$error_user = isset($_GET['error_user']) ? $_GET['error_user'] : 0;
	$error_email = isset($_GET['error_email']) ? $_GET['error_email'] : 0;
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
	            		<li><a href="index.php">Voltar para Home</a></li>
	          		</ul>
	        	</div> <!--/.nav-collapse -->
	      	</div>
		</nav>

	    <div class="container">
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="user_register.php" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="user" name="user" placeholder="Usuário" required="requiored">
						<?php
						 	if($error_user) echo "<font style='color: #FF0000'> Usuário já existe! </font>";
						?>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
						<?php
						 	if($error_email) echo "<font style='color: #FF0000'> Email já existe! </font>";
						?>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Senha" required="requiored">
					</div>

					<button type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>

			<div class="col-md-4"></div>
			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>
