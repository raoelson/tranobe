<script type="text/javascript">
	var iduser = "<?php echo $user["iduser"]?>";	
</script>
<div class="main-inner">
	<div class="container">
		<div class="row" id="main-form">
			<div class="span12">
				<div id="ancre"></div>
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-upload-alt"></i>
						<h3>Ajout d'images aux biblioth&eacute;ques</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						 <!-- dialog box -->
						<div id="uploadBox" title="Upload Images">
							<div id="plupload">
									<div id="droparea">
										<p>D&eacute;posez vos fichiers ici</p>
										<span class="or">Ou</span><a href="#" id="browse">Parcourir</a>
									</div>
									<div id="filelist"></div>
									<a href="<?php echo base_url()?>admin.php/media/" id="end">Terminer</a>
								</div>
							
						</div>
						<!-- end dialog box -->
					</div>
					<!-- /widget-content -->
				</div>
				<!-- /widget -->
			</div>
			<!-- /span12 -->
		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->
  