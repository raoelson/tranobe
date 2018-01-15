<script>
	var where= new Array();
	<?php if(isset($where)):?>
	<?php  list($key,$val) = each($where) ?>
	where[0] = "<?php echo $key ?>";
	where[1] = "<?php echo $val ?>";
	<?php endif ?>
</script>

<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<?php if ($user["idgroup"] == 1) :?>
				<span class="span5 btn-toolbar btn-group" style="margin-left:  0">
				          <a class="btn btn-primary" href="#"><i class="icon-edit"></i> Pour la séléction</a>
				          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-caret-down"></span></a>
				          <ul class="dropdown-menu">
					            <li><a href="javascript: article.action('active')"><i class="icon-ok"></i> Publier</a></li>
					            <li><a href="javascript: article.action('inactive')"><i class="icon-ban-circle"></i>Dépublier</a></li>
					             <li><a href="javascript: article.action('delete')"><i class="icon-trash"></i> Supprimer</a></li>
					           <!--  <li class="divider"></li>
					            <li><a href="#"><i class="i"></i> Make admin</a></li>--> 
				          </ul>
				</span>
				<?php endif ?>
				<div class="btn-toolbar pull-right">
					<a class="btn" href="<?php echo base_url()?>admin.php/article/edit"><i class="icon-user"></i> Nouveau</a>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>
							<?php echo $div_title ?>
						</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th><input type="checkbox" id="check_all"></th>
									<th>Titre</th>
									<th>Auteur</th>
									<th>Date</th>
									<th>Publi&eacute;</th>
									<th class="td-actions"></th>
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



	</div>
</div>
<!-- /container -->

<!-- /main-inner -->

