<div class="main-inner">
	<div class="container">
		<div class="row" id="main-form">
			<div class="span12">
				<div class="btn-toolbar input-prepend">

					<span class="add-on" style="margin-top: -9px; margin-right: -6px;"><i
						class="icon-calendar"></i> </span> <input class="input-small"
						type="text" placeholder="" id="date_prix">
				</div>
				<span class="span5 btn-toolbar btn-group" style="margin-left:  0">
				          <a class="btn btn-primary" href="#"><i class="icon-edit"></i> Pour la séléction</a>
				          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-caret-down"></span></a>
				          <ul class="dropdown-menu">
					            <li><a href="javascript: outbox.action('active')"><i class="icon-ok"></i> Marquer comme envoyé</a></li>
					            <li><a href="javascript: outbox.action('inactive')"><i class="icon-ban-circle"></i> Re-envoyé</a></li>
					             <li><a href="javascript: outbox.action('delete')"><i class="icon-trash"></i> Delete</a></li>
					           <!--  <li class="divider"></li>
					            <li><a href="#"><i class="i"></i> Make admin</a></li>--> 
				          </ul>
				</span>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-file"></i>
						<h3>Boites d'envoi</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th><input type="checkbox" id="check_all"></th>
									<th style="width: auto;">Num&eacute;ro</th>
									<th style="width: auto;">Envoyé le</th>
									<th style="width: auto;">Texte</th>
									<th style="width: auto;">Trait&eacute;</th>
									<th style="width: auto;">Erreur</th>
									<th class="td-actions" style="width: 7.5%;"></th>
								</tr>
							</thead>
							<tbody style="font-size: 10px">

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

	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

