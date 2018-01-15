<div class="main-inner">
	<div class="container">
		<div class="row" id="main-form">
			<div class="span5">
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-file"></i>
						<h3>Liste des regions</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th>#</th>
									<th>R&eacute;gion</th>
									<th>Code r&eacute;gion</th>
									<th class="td-actions" style="width: 31%"></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						<div class="well well-large well-transparent lead" id="loading-table" style="display: none">
									<i class="icon-spinner icon-spin icon-2x pull-left"></i>
									loading content...
								</div>
                                <div id="ancre"></div>
                                <?php if ($user["idgroup"] == 1):?>
						<div class="well well-large well-transparent lead" style="padding: 11px">
							<i class="icon-spinner icon-spin icon-2x pull-left" id="region-spinner" style="display: none"></i> <br>
							<form id="edit-profile" class="form-horizontal">
							<fieldset>
								<input type="hidden" id="idregion" value="null">
								<input type="text" class="input-medium" id="nom_region" placeholder="nom_region">
								<input type="text" class="input-mini" id="code_region" placeholder="code_region"> 
								<a class="btn btn-warning" href="javascript: region.save()"><i class="icon-ok"></i><span
									id="btn-ok">Ajouter</span>
								</a>&nbsp;<a class="btn" href="javascript: region.cancel()"><i class="icon-remove"></i>Cancel</a>
							</fieldset>
						</form>
						</div>
						<?php endif ?>
					</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->
			</div>
			<!-- /span8 -->
			<div class="span7" id="secondary-form">
				<div class="widget widget-box">
					<div class="widget-header">
						<h3 id="h3-district">Districts</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="secondary-table">
							<thead>
								<tr>
									<th>#</th>
									<th>District</th>
									<th>R&eacute;gion</th>
									<th>Code district</th>
									<th class="td-actions" style="width: 15%"></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						<div class="well well-large well-transparent lead" id="loading-table2" style="display: none">
									<i class="icon-spinner icon-spin icon-2x pull-left"></i>
									loading content...
								</div>
                                <div id="ancre2"></div>
						<?php if ($user["idgroup"] == 1):?>
						<div class="well well-large well-transparent lead" style="text-align: center">
							<i class="icon-spinner icon-spin icon-2x pull-left" id="district-spinner" style="display: none"></i> <br>
							<form id="edit-profile" class="form-horizontal">
							<fieldset>
								<input type="hidden" id="iddistrict" value="null">
								<input type="text" class="input-large" id="nom_district" placeholder="nom_district">
								<input type="text" class="input-mini" id="code_district" placeholder="code_district">
								<select id="region_idregion" class="input-medium"></select> 
								<div style="padding-top: 10px">
								<input type="text" id="lat" class="input-large" placeholder="latitude">
								<input type="text" id="long" class="input-large" placeholder="longitude">
								</div>
								<div style="padding-top: 24px">
								<a class="btn btn-warning" href="javascript: district.save()"><i class="icon-ok"></i>
								<span id="btn-district-ok">Ajouter</span>
								</a>&nbsp;<a class="btn" href="javascript: district.cancel()"><i class="icon-remove"></i>Cancel</a>
								</div>
							</fieldset>
						</form>
						</div>
						<?php endif ?>
					</div>
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

