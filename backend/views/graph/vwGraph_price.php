<script>
	var sqls = [];
	var graph_series = [];
	var xAxis = {};
	var yAxis = {};
	<?php foreach($graph_series as $serie): ?>
	graph_series.push(<?php echo $serie ?>);
	<?php endforeach;?>
	<?php foreach($xAxis as $x=>$val): ?>
	xAxis.<?php echo $x ?> = <?php echo $val?>; 
	<?php endforeach; ?>
	<?php foreach($yAxis as $y=>$val): ?>
	yAxis.<?php echo $y ?> = <?php echo $val?>; 
	<?php endforeach; ?>
	var graph_title = '<?php echo $graph_title ?>';
	var graph_subtitle = '<?php echo $graph_subtitle ?>';
	var prod = "<?php echo $prod ?>";
</script>

	<div class="main-inner">

		<div class="container">

			<div class="row">

				<div class="span12">
					<div class="btn-toolbar input-prepend">

					<span class="add-on" style="margin-top: -9px; margin-right: -6px;"><i
						class="icon-calendar"></i> </span> <input class="input-small"
						type="text" placeholder="" id="date_prix">
					</div>
					<div class="widget ">
						<?php if (!empty($toolbar)) echo $toolbar ?>
						
						<div class="widget-header">
							<i class="icon-user"></i>
							<h3>Graphique</h3>
						</div>
						<!-- /widget-header -->

						<div class="widget-content">
							<div id="graphique"></div>
						</div>
				<!-- /widget-content -->
				</div>
				</div>
			</div>
 		<!-- /widget -->
		</div>
		<!-- /span8 -->
	</div>
	<!-- /row -->

<!-- /container -->
<!-- /main-inner -->


