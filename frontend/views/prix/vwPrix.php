<script>
	var prod = "<?php echo $prod ?>";
</script>
<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
						
				<div class="btn-toolbar input-prepend">
					
					<span class="add-on"><i class="icon-calendar"></i> </span> <input
						class="input-small" type="text" placeholder="" id="date_prix">
					<a class="btn pull-right" href="#ancre" onclick="prix.add()"><i
						class="icon-prix"></i> Ok</a>
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
				</div>
				<!-- /widget -->

			</div>
			<!-- /span12 -->

		</div>
		<!-- /row -->
		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

