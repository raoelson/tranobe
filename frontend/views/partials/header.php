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
	onclick=""><i class="icon-search"></i> </span></div>
</div>
</div>
</form>
</div>
</div>
</div>
</header>


<div class="container">
<div class="navbar">
<div class="navbar-inner">
<ul class="nav">
	<li><a href="<?php echo base_url()?>" title="réseau des producteurs">Accueil</a></li>
	<!-- 
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Qui sommes-nous? <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo base_url()?>qui-sommes-nous/mots-des-fondateurs">Mots des fondateurs</a></li>
			<li><a href="<?php echo base_url()?>qui-sommes-nous/contexte-et-objectif-du-reseau-des-producteurs">Contexte et objectifs</a></li>
			<li><a href="#">Equipes du réseau</a></li>
		</ul>
	</li>
	 -->
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Les CSA <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo base_url()?>csa/presentation-csa">Présentation</a></li>
			<?php if ($districts) :?>
			<li class="divider"></li>
			<?php endif ?>
			<?php $current = "" ?>
			<?php foreach ($districts as $district) : ?>
			<?php
			if ($district->nom_region > $current) {
                if ($current<>"") echo '</ul></li>';
				$current = $district->nom_region;
               	echo '<li class="dropdown-submenu">
				<a href="#" >'.strtoupper($district->nom_region). '</a>
				<ul class="dropdown-menu">';
	        }?>
	        <li><a href="<?php echo base_url()?>presentation/csa/<?php echo $district->code_district?>-<?php echo url_title($district->nom_district)?>" ><?php echo ucwords(strtolower($district->nom_district)) ?></a></li>
			<?php endforeach ?>
			<?php if ($districts):?>
			</ul>
			</li>
			<?php endif ?>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Les Tranoben'ny Tantsaha <b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo base_url()?>presentation/tranobe-ny-tantsaha/8-tanobe-ny-tantsaha-nationale">La Tranoben'ny Tantsaha Nationale</a></li>
			<?php if ($regions):?>
			<li class="divider"></li>
			<?php endif ?>
			<?php foreach($regions as $region) :?>
			<li><a href="<?php echo base_url()?>presentation/tranobe-ny-tantsaha/<?php echo $region["idregion"]."-".url_title($region["nom_region"])?>"><?php echo strtoupper($region["nom_region"])?></a></li>
			<?php endforeach ?>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Les OPF<b class="caret"></b></a>
		<ul class="dropdown-menu">
 			<?php menu("organisation-paysane-faitiere"); ?>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Les Partenaires<b class="caret"></b></a>
		<ul class="dropdown-menu">
 			<?php menu("partenaires"); ?>
		</ul>
	</li>
	<li><a href="#">Annuaires</a></li>
	<li><a href="<?php echo base_url()?>contact"> Contact </a></li>
	<form class="navbar-form pull-right"><a href="#"> 
	<i class="icon-facebook-sign"></i> </a> <a href="#"> 
	<i class="icon-twitter-sign"></i> </a> <a href="#"> 
	<i class="icon-google-plus-sign"></i> </a></form>
</ul>
</div>
</div>

<ul class="breadcrumb">
	<li <?php echo (empty($niveau1))?"class='active'":""?>><a href="<?php echo (empty($niveau1))?"#":base_url()?>">Accueil</a> <span class="divider">/</span></li>
	<?php if (isset($niveau1)) :?><li <?php echo (empty($niveau2))?"class='active'":""?> ><a href="#<?php //echo (empty($niveau2))?"#":$niveau1["link"]?>"><?php echo $niveau1["text"]?></a> <span class="divider">/</span></li><?php endif ?>
	<?php if (isset($niveau2)) :?><li class="active"><?php echo $niveau2["text"]?></li><?php endif ?>
</ul>
</div>