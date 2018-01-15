<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-file-alt"></i>
						<h3>Importation de fichier excel</h3>
					</div>
				</div>
				<!-- /widget-header -->
				<div class="widget-content">
					<?php if(isset($errors)): ?>
					<ul>
						<?php foreach($errors as $erreur): ?>
						<li><?php echo $erreur ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<?php if (isset($total_import)) :?>
					<h3>Récapitulation de l'importation</h3>
					<hr />
					<br />
					<ul>
						<li>Lignes totales lues : <?php echo $total_import?>
						</li>
						<li>Lignes totales importées: <?php echo $nb_insert ?>
						</li>
					</ul>
					<?php endif ?>
					<a href="<?php echo base_url() ?>admin.php/op/op/import"
						class="btn btn-success">RETOUR</a>
				</div>
				<hr />
				<br />
			</div>
			<!-- /widget-content -->
		</div>
		<!-- /widget -->
	</div>
	<!-- /span12 -->
</div>
</div>
<!-- /row -->
<!-- /container -->

<!-- /main-inner -->




