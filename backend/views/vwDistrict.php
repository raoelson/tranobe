<div class="main-inner">
<div class="container">
<div class="row" id="main-form">
<div class="span5">
<div class="widget ">
<div class="widget-header"><i class="icon-file"></i>
<h3>Liste des regions</h3>
</div>
<!-- /widget-header -->
<div class="widget-content">
<table class="table table-striped table-bordered" id="main-table">
	<thead>
		<tr>
			<th>R&eacute;gion</th>
			<th>District</th>
			<th>Code district</th>
		</tr>
	</thead>
	<tbody>
	<?php $current=""?>
	<?php foreach($districts as $district):?>
	<tr>
		<?php if ($district->nom_region>$current) :?>
		<td><?php echo $district->nom_region?></td>
		<?php $current = $district->nom_region?>
		<?php else :?>
		<td></td>
		<?php endif ?>
		<td><?php echo $district->nom_district?></td>
		<td><?php echo $district->code_district?></td>
	</tr>
	<?php endforeach;?>
	</tbody>
</table>


</div>
<!-- /widget-content --></div>
<!-- /widget --></div>

<!-- /span4 --></div>
</div>
<!-- /container --></div>
<!-- /main-inner -->

