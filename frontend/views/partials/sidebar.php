<?php box("actu") ?>
<?php box("actu_regionale")?>
<div class="box">
	<h3 title="SIM et Bases de données">
		<i class="icon-list-ul pull-right"></i>SIM et Bases de données
	</h3>
	<ul>
		<li><a href="/tsena" title="offre et demande des producteurs">Offres et demandes</a></li>
		<li><a href="/graph/prix">Prix des produits à Madagascar</a></li>
		<li><a href="/op">Base de données des OP</a></li>
	</ul>
</div>
<div class="box">
	<h3>
		<i class="icon-map-marker pull-right"></i>Retrouvez les infos sur
		carte
	</h3>
	<?php $this->load->view("partials/map")?>
</div>
