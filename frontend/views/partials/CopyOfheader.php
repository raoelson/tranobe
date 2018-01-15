<header>
<div class="container">
<div class="row">
<div class="span6">
<div class="logo">
<h1><a href="<?php echo base_url()?>" title="réseau des producteurs">
Réseau des<span class="color"> producteurs</span> </a></h1>
<div class="hmeta">Lieu d'échange et de rencontre des producteurs et
consommateurs.</div>
</div>
</div>
<div class="span6" id="span-search">
<form action="#">
<div class="control-group">
<div class="controls">
<div class="input-append"><input class="span2" id="s" type="text"
	placeholder="Rechercher"> <span class="add-on"
	onclick="alert('rechercher')"><i class="icon-search"></i> </span></div>
</div>
</div>
</form>
</div>
</div>
</div>
</header>
<?php if (!empty($menus)) :?>

<div class="container">
<div class="navbar">
<div class="navbar-inner">
<ul class="nav">
	<li><a href="<?php echo base_url()?>" title="réseau des producteurs">Accueil</a></li>
	<?php $current = 0 ?>
	<?php foreach ($menus as $menu):?>
	<?php if ($menu["idcategorie"]>$current) :?>
	<?php if ($current<>0): ?>
</ul>
</li>
<?php endif ?> <?php $current = $menu["idcategorie"]?>
<li class="dropdown"><a href="#" class="dropdown-toggle"
	data-toggle="dropdown"> <?php echo $menu["alias_categorie"]?> <b
	class="caret"></b> </a>
<ul class="dropdown-menu">
<?php endif ?>
	<li><a
		href="<?php echo base_url().human_url($menu["nom_categorie"])."/".$menu["idpage"]."-".human_url($menu["title"])?>"><?php echo $menu["title"]?></a></li>
		<?php endforeach; ?>
</ul>
</li>
<li><a href="#contact"> Contact </a></li>
<form class="navbar-form pull-right"><a href="#"> <i
	class="icon-facebook-sign"></i> </a> <a href="#"> <i
	class="icon-twitter-sign"></i> </a> <a href="#"> <i
	class="icon-google-plus-sign"></i> </a></form>
</ul>
</div>
</div>
<ul class="breadcrumb">
	<li <?php echo (empty($niveau1))?"class='active'":""?>><a href="<?php echo (empty($niveau1))?"#":base_url()?>">Accueil</a> <span class="divider">/</span></li>
	<?php if (isset($niveau1)) :?><li <?php echo (empty($niveau2))?"class='active'":""?> ><a href="#<?php //echo (empty($niveau2))?"#":$niveau1["link"]?>"><?php echo $niveau1["text"]?></a> <span class="divider">/</span></li><?php endif ?>
	<?php if (isset($niveau2)) :?><li class="active"><?php echo $niveau2["text"]?></li><?php endif ?>
</ul>
</div>
<?php endif ?>