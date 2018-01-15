
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
              <div class="navbar-inner">
                <a class="brand" href="#" style="font-size: 28px;"><i class="icon-book icon-4"></i>&nbsp;&nbsp;Base de données des OP</a>
              </div>
            </div>
	<div id="header" style="padding: 0;">
		<div class="widget-header">
			<i class="icon-search"></i>
			<h3 id="title">Formulaire de recherche</h3>
		</div>
		<form name="form-op" id="form-op" method="post" action="#"
				class="form-inline">
		<table class="table table-bordered">
			
				<tr>
					<td><label for="region_idregion">Région</label></td>
					<td><select class="input-medium" name="region_idregion"
						id="region_idregion">
					</select>
					</td>
					<td><label for="code_district">District</label>
					</td>
					<td><select class="input-medium disabled" disabled="disabled"
						name="code_district" id="code_district">
							<option></option>
					</select>
					</td>
					<td><label for="commune">Commune </label></td>
					<td><input type="text" class="input-medium" name="commune"
						id="commune">
					</td>
				</tr>
				<tr>
					<td><label for="fokontany">Fokontany </label></td>
					<td><input type="text" class="input-medium" name="fokontany"
						id="fokontany">
					</td>
					<td><label for="nom_op">Nom de l'OP</label></td>
					<td><input type="text" class="input-medium" name="nom_op"
						id="nom_op">
					</td>
					<td><label for="date_creation">Année de création </label>
					</td>
					<td><input type="text" class="input-medium" name="date_creation"
						id="date_creation">
						
					</td>
				</tr>
				<tr>
					<td><label for="filiere_prioritaire">Filière prioritaire</label></td>
					<td><input type="text" class="input-medium"
						name="filiere_prioritaire" id="filiere_prioritaire">
					</td>
					<td><label for="filiere_secondaire">Filière sécondaire</label></td>
					<td><input type="text" class="input-medium"
						name="filiere_secondaire" id="filiere_secondaire">
					</td>
					<td><label for="filiere_tertiaire">Filière tertiaire</label>
					</td>
					<td><input type="text" class="input-medium"
						name="filiere_tertiaire" id="filiere_tertiaire">
					</td>
				</tr>
				<tr>
					<td><input type="checkbox" id="is_formel">&nbsp;Formel</td>
					<td><input type="checkbox" id="intrant">&nbsp;Fournisseur d'intrant</td>
					<td><input type="checkbox" id="semence">&nbsp;Producteur de semence</td>
					<td><input type="checkbox" id="collecte">&nbsp;Collecteur &amp; Transporteur</td>
					<td><input type="checkbox" id="transformation">&nbsp;Spéc. en
						conditionnement et transformation</td>
					<td><input type="checkbox" id="commerce">&nbsp;Spéc. en
						commercialisation</td>

				</tr>
				<tr>
					<td colspan="6" style="vertical-align: text-top"><a
						class="btn btn-success" href="javascript: op.find(1)"><i
							class="icon-search icon-large"></i> Rechercher</a></td>
				</tr>
			
		</table>
		</form>
	</div>
	<div class="affichage">
		Afficher : <select id="nb_per_page" class="span1">
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="100">100</option>
		</select>
	</div>
	<div class="widget widget-table action-table">
		<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3 id="title">Résultats du recherche</h3>
		</div>
		<!-- /widget-header -->

		<div class="widget-content">
			<table class="table table-striped table-bordered" id="main-table">
				<thead>
					<tr>
						<th>Région</th>
						<th>Ditrict</th>
						<th>Commune</th>
						<th>Fokontany</th>
						<th>Nom OP</th>
						<th>Filière prioritaire</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="7">Nombre total d'enregistrements: <span
							id="nb_total" style="color: red"></span>
						</td>

					</tr>
				</tfoot>
			</table>

			<div class="well well-large well-transparent lead" id="loading-table"
				style="display: none">
				<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
				content...
			</div>

		</div>
		<!-- /widget-content -->

		<div class="pagination pull-right"></div>

	</div>
	<!-- /widget -->

</section>

<div class="modal hide fade" id="error-region">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Oups!</h3>
  </div>
  <div class="modal-body">
    <p>Veuillez sélectionner une région…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn close" data-dismiss="modal" aria-hidden="true">Fermer</a>
  </div>
</div>

<div class="modal hide fade" id="op_dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Information sur l'OP : <span id="nom_OP" style="font-size: 20px;"></span></h3>
  </div>
  <div class="modal-body">
  	<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3 id="title">INFORMATIONS GENERALES</h3>
	</div>
    <table class="table table-striped table-bordered">
    <tbody>
    	<tr><td>Région</td><td id="info_region"></td></tr>
    	<tr><td>District</td><td id="info_district"></td></tr>
    	<tr><td>Commune</td><td id="info_commune"></td></tr>
    	<tr><td>Fokontany</td><td id="info_fokontany"></td></tr>
    	<tr><td>Nom_OP</td><td id="info_nom_op"></td></tr>
    	<tr><td>Date_creation</td><td id="info_date_creation"></td></tr>
    	<tr><td>Nom du Président</td><td id="info_nom_president"></td></tr>
    	<tr><td>Contact</td><td id="info_numtel"></td></tr>
    	<tr><td>Nb Homme</td><td id="info_nb_homme"></td></tr>
    	<tr><td>Nb femme</td><td id="info_nb_femme"></td></tr>
    	<tr><td>TOTAL</td><td id="info_total"></td></tr>
    	<tr><td>Nb femme membre bureau</td><td id="info_nb_femme_bureau"></td></tr>
    	<tr><td>Formelle</td><td id="info_is_formel"></td></tr>
    </tbody>
    </table>
    
    	<table class="table table-striped table-bordered" style="width: 100%">
    	<div class="widget-header">
			<i class="icon-th-list"></i>
			<h3 id="title">FILIERE</h3>
		</div>
    	<tr>
    		<th>Priorité</th>
    		<th>Filière</th>
    		<th>Spécialisation</th>
    	</tr>
    	<tr>
    		<td>1</td>
    		<td id="info_filiere1"></td>
    		<td id="info_spec_filiere1">
    	</tr>
    	<tr>
    		<td>2</td>
    		<td id="info_filiere2"></td>
    		<td id="info_spec_filiere2">
    	</tr>
    	<tr>
    		<td>3</td>
    		<td id="info_filiere3"></td>
    		<td id="info_spec_filiere3">
    	</tr>
    	</table>	
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Fermer</a>
  </div>
</div>

