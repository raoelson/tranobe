
<style>
label {
	padding-top: 10px;
}
</style>
<script>
	var where= new Array();
	<?php if(isset($where)):?>
	<?php  list($key,$val) = each($where) ?>
	where[0] = "<?php echo $key ?>";
	where[1] = "<?php echo $val ?>";
	<?php endif ?>
</script>
<section class="container">
<div class="navbar">
<div class="navbar-inner"><a class="brand" href="#"
	style="font-size: 28px;"><i class="icon-money icon-4"></i>&nbsp;&nbsp;OFFRE
ET DEMANDE</a></div>
</div>
<div id="header" style="padding: 0;">
<div class="widget-header"><i class="icon-search"></i>
<h3 id="title">Formulaire de recherche</h3>
</div>
<form name="form-op" id="form-op" method="post" action="#"
	class="form-inline">
<table class="table table-bordered">

	<tr>
		<td><label for="region_idregion">Région</label></td>
		<td><select class="input-medium" name="region_idregion"
			id="region_idregion">
		</select></td>
		<td><label for="code_district">District</label></td>
		<td><select class="input-medium disabled" disabled="disabled"
			name="code_district" id="code_district">
			<option></option>
		</select></td>
		<td><label for="type">Type </label></td>
		<td><select class="input-medium" id="type">
			<option></option>
			<option value="OFF">Offre</option>
			<option value="DMD">Demande</option>
		</select></td>
	</tr>
	<tr>
		<td><label for="commune">Produit </label></td>
		<td><select id="produit_idproduit">
		<?php $current = 0 ?>
			<option></option>
			<?php foreach($produits as $produit):?>
			<?php  if ($produit["idcat_produit"] > $current) :?>
			<?php $current = $produit["idcat_produit"] ?>
			<optgroup label="<?php echo $produit["nom_categorie"]?>" style="border: 1px solid #CCC"></optgroup>
			<?php endif ?>
			<option value="<?php echo $produit["idproduit"]?>"><?php echo ucfirst(strtolower($produit["nom_produit"]))?></option>
			<?php endforeach?>
		</select></td>
		<td><label for="prix_min">Prix minimal </label></td>
		<td><input type="text" class="input-medium" name="prix_min"
			id="prix_min"></td>
		<td><label for="prix_max">Prix maximal </label></td>
		<td><input type="text" class="input-medium" name="prix_max"
			id="prix_max"></td>
	</tr>
	<tr>
		<td colspan="6" style="vertical-align: text-top"><a
			class="btn btn-success" href="javascript: offre_demande.find(1)"><i
			class="icon-search icon-large"></i> Rechercher</a></td>
	</tr>

</table>
</form>
</div>
<div class="affichage">Afficher : <select id="nb_per_page" class="span1">
	<option value="20">20</option>
	<option value="50">50</option>
	<option value="100">100</option>
</select></div>
<div
	class="widget widget-table action-table">
<div class="widget-header"><i class="icon-th-list"></i>
<h3 id="title">Résultats du recherche</h3>
</div>
<!-- /widget-header -->

<div class="widget-content">
<table class="table table-striped table-bordered" id="main-table">
	<thead>
		<tr title="cliquer ici pour trier" style="text-transform: uppercase">
			<th>Type</th>
			<th>Date</th>
			<th>District</th>
			<th>Produit</th>
			<th>Qté</th>
			<th>Pu</th>
			<th>Contact</th>
			<th></th>
		</tr>

	</thead>
	<tbody>

	</tbody>
	<tfoot>
		<tr>
			<td colspan="10">Nombre total d'enregistrements: <span id="nb_total"
				style="color: red"></span></td>

		</tr>
	</tfoot>
</table>

<div class="well well-large well-transparent lead" id="loading-table"
	style="display: none"><i
	class="icon-spinner icon-spin icon-2x pull-left"></i> loading
content...</div>

</div>
<!-- /widget-content -->

<div class="pagination pull-right"></div>

</div>
<!-- /widget -->

</section>

<div class="modal hide fade" id="error-region">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
	aria-hidden="true">&times;</button>
<h3>Oups!</h3>
</div>
<div class="modal-body">
<p>Veuillez sélectionner une région…</p>
</div>
<div class="modal-footer"><a href="#" class="btn close"
	data-dismiss="modal" aria-hidden="true">Fermer</a></div>
</div>

<div class="modal hide fade" id="offre_demande_dialog">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"
	aria-hidden="true">&times;</button>
<h3><span id="title_offre" style="font-size: 20px;"></span></h3>
</div>
<div class="modal-body">
<div class="widget-header"><i class="icon-th-list"></i>
<h3 id="title">INFORMATIONS GENERALES</h3>
</div>
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<td>Région</td>
			<td id="info_region"></td>
		</tr>
		<tr>
			<td>District</td>
			<td id="info_district"></td>
		</tr>
		<tr>
			<td>Produit</td>
			<td id="info_produit"></td>
		</tr>
		<tr>
			<td>Quantité</td>
			<td id="info_qte"></td>
		</tr>
		<tr>
			<td>Prix Unitaire</td>
			<td id="info_pu"></td>
		</tr>
		<tr>
			<td>Qualité</td>
			<td id="info_qlte"></td>
		</tr>
		<tr>
			<td>Annonce</td>
			<td id="info_annonce"></td>
		</tr>
		<tr>
			<td>Contact</td>
			<td id="info_numtel"></td>
		</tr>
		<tr>
			<td>Type</td>
			<td id="info_type"></td>
		</tr>
	</tbody>
</table>
</div>
<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal"
	aria-hidden="true">Fermer</a></div>
</div>

