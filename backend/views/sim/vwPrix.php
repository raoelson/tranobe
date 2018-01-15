<script>
	var prod = "<?php echo $prod ?>";
</script>
<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
						
				<div class="btn-toolbar input-prepend">
					
					<span class="add-on" style="margin-top: -8px;margin-right: -6px;"><i class="icon-calendar"></i> </span> <input
						class="input-small" type="text" placeholder="" id="date_prix">
				
					
					<a class="btn pull-right" href="#ancre" onclick="prix.add()"><i
						class="icon-prix"></i> Nouveau</a>
				</div>

				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3 id="h3-title">
							<?php echo empty($div_title)?ucfirst($active):$div_title ?>
						</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>

							</thead>
							<tbody>
								
							</tbody>
						</table>

						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>

					</div>
					<!-- /widget-content -->
					<div class="pagination pull-right">
						<ul>
							<li class="disabled"><a href="#">Prec.</a>
							</li>
							<li class="disabled"><a href="#">1</a>
							</li>
							<li><a href="#">2</a>
							</li>
							<li><a href="#">3</a>
							</li>
							<li><a href="#">4</a>
							</li>
							<li><a href="#">5</a>
							</li>
							<li><a href="#">Suiv.</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /widget -->

			</div>
			<!-- /span12 -->

		</div>
		<!-- /row -->

		<div class="row" id="main-form" style="display: none">
			<div class="span8">
				<div id="ancre"></div>
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-prix"></i>
						<h3>Edition d'un prix</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile" data-toggle="tab">Prix</a>
								</li>
								<!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->

							</ul>
							<br>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
									<div class="alert" id="alert" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p></p>
									</div>
									<form id="edit-profile" class="form-horizontal">
										<input type="hidden" id="action" value="null">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="nom_prix">Date</label>
												<div class="controls">
													<input type="text" class="input-medium" id="date"
														name="date">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="district_iddistrict">District</label>
												<div class="controls">
													<?php $current = 0 ?>
													<select name="code_district" id="code_district">
														<option></option>
														<?php foreach ($districts as $district) : ?>
														<?php
														if ($district->idregion > $current) {
								                            $current = $district->idregion;
								                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
								                        }
								                        ?>
														<option value="<?php echo $district->code_district ?>">
															<?php echo ucwords(strtolower($district->nom_district)) ?>
														</option>
														<?php endforeach ?>
														</optgroup>
													</select>
												</div>
											</div>
											<!-- /control-group -->
											<?php foreach($produits as $produit) :?>
											<div class="control-group">
												<label class="control-label"
													for="<?php echo $produit["idproduit"] ?>"><?php echo $produit["nom_produit"] ?>
												</label>
												<div class="controls">
													<input type="text" class="input-mini prix"
														id="prix_<?php echo $produit["idproduit"]?>"> (kg)
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->
											<?php endforeach ?>
											<br>
											<div class="form-actions">
												<a class="btn btn-primary" href="javascript: prix.save()">Save</a>
												<a class="btn" href="javascript: prix.cancel()">Cancel</a>
											</div>
											<!-- /form-actions -->
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->
			</div>
			<!-- /span8 -->
			<div class="span4">
				<div class="widget widget-box">
					<div class="widget-header">
						<h3>Aide</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content"></div>
					<!-- /widget-content -->

				</div>
				<!-- /widget-box -->

			</div>
			<!-- /span4 -->

		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

