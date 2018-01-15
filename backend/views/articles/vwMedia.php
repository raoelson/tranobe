<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<span class="span5 btn-toolbar btn-group" style="margin-left:  0">
				          <a class="btn btn-primary" href="#"><i class="icon-edit"></i> Pour la séléction</a>
				          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-caret-down"></span></a>
				          <ul class="dropdown-menu">
					             <li><a href="javascript: media.action('delete')"><i class="icon-trash"></i> Supprimer</a></li>
					           <!--  <li class="divider"></li>
					            <li><a href="#"><i class="i"></i> Make admin</a></li>--> 
				          </ul>
				</span>
				<div class="btn-toolbar pull-right">
					<a class="btn" href="<?php echo base_url()?>admin.php/media/edit"><i
						class="icon-picture"></i> Ajouter des images</a>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-picture icon-2x"></i>
						<h3>
							<?php echo ucfirst($div_title) ?>
						</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<ul class="thumbnails" id="thumbnails" style="padding-top: 10px; padding-left: 10px">
							
						</ul>

						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: block">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>
					</div>
					<!-- Modal -->
						<div id="myModal" class="modal hide fade" style="width:auto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">Apercu de l'image</h3>
						  </div>
						  <div class="modal-body">
						    
						  </div>
						  <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
						  </div>
						</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->

			</div>
			<!-- /span12 -->

		</div>
		<!-- /row -->



	</div>
</div>
<!-- /container -->

<!-- /main-inner -->

