<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">

				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>Gestion des catégories</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Catégorie</th>
									<th>Sous Catégorie</th>
									<th>Alias</th>
									<?php if ($user["idgroup"] == 1) :?><th class="td-actions"></th><?php endif?>
								</tr>
							</thead>
							<tbody>

							</tbody>
							<tfoot>
							<?php if ($user["idgroup"] == 1) :?>
							<tr style="vertical-align: bottom">
							<td><input type="hidden" id="idsous_categorie" value="null"></td>
							<td><select  style="width: 40%;margin-bottom: -4px;" id="categorie_idcategorie" name="categorie_idcategorie">
								<option></option>
								<?php foreach ($categories as $categorie):?>
								<option value="<?php echo $categorie["idcategorie"]?>"><?php echo $categorie["alias_categorie"]?></option>
								<?php endforeach ?>
							</select>
							</td>
							<td><input type="text" style="width: 40%;margin-bottom: -4px;" id="nom_sous_categorie" name="nom_sous_categorie"></td>
							<td><input type="text" style="width: 40%;margin-bottom: -4px;" id="alias_sous_categorie" name="alias_sous_categorie"></td>
							<td class="td-actions">
							<a href="javascript: sous_categorie.save()" class="btn btn-small btn-warning"> <i class="btn-icon-only icon-save"></i></a>';
							<a href="javascript: sous_categorie.cancel()" class="btn btn-small"> <i class="btn-icon-only icon-off"></i></a>';
						</td></tr>
							<?php endif ?>
							</tfoot>
						</table>
						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>
					</div>
					<!-- /widget -->
				</div>
				<!-- /span12 -->
			</div>
			<!-- /row -->
		</div>
	</div>
</div>
<!-- /container -->

<!-- /main-inner -->
