<!DOCTYPE html>
<html
	lang="fr">
<head>
<meta charset="utf-8">
<title>Login - Tranoben'ny Tantsaha</title>

<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link
	href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo base_url() ?>assets/backend/css/bootstrap-responsive.min.css"
	rel="stylesheet" type="text/css" />

<link href="<?php echo base_url() ?>assets/backend/css/font-awesome.css"
	rel="stylesheet">

<link href="<?php echo base_url() ?>assets/backend/css/base-admin.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>assets/backend/css/pages/signin.css"
	rel="stylesheet" type="text/css">

<script>var BASE_URL = "<?php echo base_url() ?>";</script>
</head>

<body>
<div class="navbar navbar-fixed-top">

<div class="navbar-inner">

<div class="container"><a class="btn btn-navbar" data-toggle="collapse"
	data-target=".nav-collapse"> <span class="icon-bar"></span> <span
	class="icon-bar"></span> <span class="icon-bar"></span> </a> <a
	class="brand" href="<?php echo base_url() ?>" target="_blank">
Seraseran'ny Tantsaha </a>

<div class="nav-collapse">
<ul class="nav pull-right">
	<li class=""><a href="<?php echo base_url()?>" class=""> <i
		class="icon-chevron-left"></i> Retour au page d'accueil </a></li>
</ul>
</div>
<!--/.nav-collapse --></div>
<!-- /container --></div>
<!-- /navbar-inner --></div>
<!-- /navbar -->

<div class="account-container register">

<div class="content clearfix">

<form id="signup-form"
	action="<?php echo base_url()?>admin.php/auth/create" method="post">

<h1>Création de compte</h1>

<div class="login-fields"><?php if (empty($erreurs)&&(empty($success))):?>
<p>Détail de votre compte:</p>

<div class="field"><label for="firstname">Login:</label> <input
	type="text" id="login" name="login" value="" placeholder="login"
	class="login" /></div>
<!-- /field -->
<div class="field"><label for="email">Adresse email:</label> <input
	type="text" id="email" name="email" value="" placeholder="Email"
	class="login" /></div>
<!-- /field -->
<div class="field"><label for="numtel">Numéro Télephone:</label> <input
	type="text" id="numtel" name="numtel" class="login" value="+26134" /></div>
<!-- /field -->
<div class="field"><label for="group_idgroup">Group</label> <select
	name="group_idgroup" id="group_idgroup">
	<option></option>
	<?php foreach ($groups as $group):?>
	<option value="<?php echo $group["idgroup"] ?>"><?php echo $group["groupname"] ?></option>
	<?php endforeach ?>
</select></div>
<div class="field"><?php $current = 0 ?> <select name="code_district"
	id=code_district>
	<option></option>
	<?php foreach ($districts as $district) : ?>
	<?php
	if ($district->idregion > $current) {
		$current = $district->idregion;
		echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
	}
	?>
	<option value="<?php echo $district->code_district ?>"><?php echo ucwords(strtolower($district->nom_district)) ?>
	</option>
	<?php endforeach ?>
	</optgroup>
</select></div>
<div class="field"><label for="password">Mot de passe:</label> <input
	type="password" id="password" name="password" value=""
	placeholder="Mot de passe" class="login" /></div>
<!-- /field -->

<div class="field"><label for="confirm_password">Confirmation du mot de
passe:</label> <input type="password" id="confirm_password"
	name="confirm_password" value="" placeholder="Confirmer mot de passe"
	class="login" /></div>
<!-- /field --></div>
<!-- /login-fields -->

<div class="login-actions"><a href="javascript: auth.signup()"
	class="button btn btn-primary btn-large">S'enregistrer</a></div>
<!-- .actions --> <?php elseif (!empty($success)) :?>
<p class="alert alert-info"><i
	class="icon-info-sign"></i> <span>Votre compte a été créé et sera
activé, vous sera notifié prochainement.</span></p>
	<?php elseif (!empty($erreurs)):?>
<ul>
<?php foreach ($erreurs as $error):?>
	<li><?php echo $error ?></li>
	<?php endforeach;?>

</ul>
	<a href="javascript: history.go(-1)"
	class="button btn btn-primary">Retour</a>
	<?php endif ?></form>

</div>
<!-- /content --></div>
<!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">Vous avez déjà un compte? <a
	href="<?php echo base_url()?>admin.php/auth/login">Se connecter</a></div>
<!-- /login-extra -->


<script
	src="<?php echo base_url() ?>assets/backend/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/bootstrap.js"></script>
<script
	src="<?php echo base_url() ?>assets/backend/js/signin.js?<?php echo mktime()?>"></script>

</body>

<!-- Mirrored from wbpreview.com/previews/WB00U99JJ/signup.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 21 Feb 2013 14:41:12 GMT -->
</html>
