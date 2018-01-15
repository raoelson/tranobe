<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYGhOAkhM1kVXVjYG4QW97_arnqqhF-oI&sensor=false"></script>
<script>
	var districts = [];
	<?php foreach ($all_districts as $district) :?>
	districts.push(["<?php echo $district->nom_district ?>",<?php echo $district->lat?>,<?php echo $district->long?>,<?php echo $district->code_district?>]);
	<?php endforeach ?>
</script>
<div id="map_canvas" class="span12" style="margin: auto 0;min-height: 800px;z-index: 1; border: 1"></div>
