<div class="main-inner">
	<div class="container">
		<div class="row" id="main-form">
			<div class="span5">
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-file"></i>
						<h3>Liste des Mot cl&eacute;s</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Mot cl&eacute;</th>
									<th>Description</th>
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
						<div class="well well-large well-transparent lead" style="padding: 11px">
							<i class="icon-spinner icon-spin icon-2x pull-left" id="keyword-spinner" style="display: none"></i> <br>
							<form id="edit-profile" class="form-horizontal">
							<fieldset>
								<input type="hidden" id="idkeyword" value="null">
								<input type="text" class="input-mini" id="keyword" placeholder="keyword">
								<input type="text" class="input-medium" id="keyword_description" placeholder="keyword_description"> 
								<a class="btn btn-warning" href="javascript: keyword.save()"><i class="icon-ok"></i><span
									id="btn-ok">Ajouter</span>
								</a>&nbsp;<a class="btn" href="javascript: keyword.cancel()"><i class="icon-remove"></i>Cancel</a>
							</fieldset>
						</form>
						</div>
						
					</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->
			</div>
			<!-- /span8 -->
			<div class="span7" id="secondary-form">
				<div class="widget widget-box">
					<div class="widget-header">
						<h3>Group</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="secondary-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Groups</th>
									<th>Description</th>
                                    <th>Mot cl&eacute;</th>
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
						<div class="well well-large well-transparent lead" style="text-align: left;">
							<i class="icon-spinner icon-spin icon-2x pull-left" id="group-spinner" style="display: none"></i> <br>
							<form id="edit-profile" class="form-horizontal">
							<fieldset>
								<input type="hidden" id="idgroup" value="null">
								<input type="text" class="input-medium" id="groupname" placeholder="nom du groupe">
								<input type="text" class="input-long" id="description" placeholder="description">
								<select id="keyword_idkeyword" class="input-mini"></select> 
								<div style="padding-top: 24px">
								<a class="btn btn-warning" href="javascript: group.save()"><i class="icon-ok"></i>
								<span id="btn-group-ok">Ajouter</span>
								</a>&nbsp;<a class="btn" href="javascript: group.cancel()"><i class="icon-remove"></i>Cancel</a>
								</div>
							</fieldset>
						</form>
						</div>
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

