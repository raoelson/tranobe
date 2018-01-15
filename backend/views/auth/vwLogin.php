<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Login - Tranoben'ny Tantsaha</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/backend/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url() ?>assets/backend/css/pages/signin.css" rel="stylesheet" type="text/css">

<script>var BASE_URL = "<?php echo base_url() ?>";</script>
</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="<?php echo base_url() ?>" target="_blank">
				Seraseran'ny Tantsaha				
			</a>			
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="<?php echo base_url()?>admin.php/auth/signup" class="">
							Créer un nouveau compte
						</a>
					</li>
					
					<li class="">						
						<a href="<?php echo base_url()?>" class="">
							<i class="icon-chevron-left"></i>
							Retour au page d'accueil
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form>
		
			<h1>Authentification</h1>		
			
			<div class="login-fields">
				
				<p>Identifiez-vous avec votre compte:</p>
				
				<div class="field">
					<label for="username">Login:</label>
					<input type="text" id="login" name="login" value="" placeholder="Login" class="login username-field" required/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Mot de passe :</label>
					<input type="password" id="password" name="password" value="" placeholder="Mot de passe" class="login password-field" required/>
				</div> <!-- /password -->
				<div class="field" style="text-align: center">
					<label for="to" style="display: block">Me rédiriger vers :</label>
					<select id="to" class="login">
						<option value="admin">Administration de page</option>
						<option value="price">Ajout de prix</option>
					</select>
				</div>
				
			</div> <!-- /login-fields -->
			<p class="alert alert-info" style="display: none">
      				<i class="icon-info-sign"></i> <span></span>
    		</p>
			<div class="login-actions">
				<h3 style="font-size: 36px;float: left;margin: 15px 34px 0;display: none" id="load"><i class="icon-spinner icon-spin"></i></h3>					
				<input type="button" class="button btn btn-warning btn-large" value='Se connecter' id="connecter" onclick="auth.login()">
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Pas encore membre? <a href="<?php echo base_url()?>admin.php/auth/signup">Enregistrez-vous</a><br/>
<!--  	Mot de passe <a href="#">oublié?</a> -->
</div> <!-- /login-extra -->


<script src="<?php echo base_url() ?>assets/backend/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/signin.js?<?php echo mktime()?>"></script>

</body>
</html>

