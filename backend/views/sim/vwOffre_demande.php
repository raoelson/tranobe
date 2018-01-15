<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<?php if ($user["idgroup"] == 1) :?>
				<div class="btn-toolbar pull-right">
					<a class="btn" href="#ancre" onClick="produit.add()"><i class="icon-produit"></i>
						Nouveau</a>
				</div>
				<?php endif ?>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>
							<?php echo empty($div_title)?ucfirst($active):$div_title ?>
						</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr title="cliquer ici pour trier">
									<th>#</th>
									<th>Date</th>
									<th>District</th>
									<th>Produit</th>
									<th>Qté</th>
									<th>PU</th>
									<th>Qlté</th>
									<th>Annonce</th>
									<th>Contact</th>
									
									<th>Type</th>
									<?php if ($user["idgroup"] == 1) :?><th class="td-actions"></th><?php endif ?>
								</tr>
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
						<i class="icon-produit"></i>
						<h3>Edition d'un produit</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile" data-toggle="tab">Produit</a>
								</li>
								<!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->

							</ul>
							<br>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
									<div class="alert" id="alert" style="display: none ;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p></p>
									</div>
									<form id="edit-profile" class="form-horizontal">
										<input type="hidden" id="idproduit" value="null">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="nom_produit">Désignation</label>
												<div class="controls">
													<input type="text" class="input-xlarge" id="nom_produit">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="firstname">Code</label>
												<div class="controls">
													<input type="text" class="input-medium" id="code_produit" value="">
												</div>
												<!-- /controls -->
											</div>
											<div class="control-group">
												<label class="control-label" for="firstname">Unité</label>
												<div class="controls">
													<input type="text" class="input-medium" id="unite" value="kg">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->
											<br>
											<div class="form-actions">
												<a class="btn btn-primary" href="javascript: produit.save()">Save</a>
												<a class="btn" href="javascript: produit.cancel()">Cancel</a>
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

