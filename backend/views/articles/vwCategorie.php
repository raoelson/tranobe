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
									<th>Alias</th>
									<?php if ($user["idgroup"] == 1) :?><th class="td-actions"></th><?php endif?>
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
