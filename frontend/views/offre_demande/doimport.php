<section class="container">
<div class="row">
<div class="box">
<?php if(isset($errors)): ?>
<ul>
	<?php foreach($errors as $erreur): ?>
	<li><?php echo $erreur ?></li>
	<?php endforeach; ?>
</ul>
<a href="<?php echo base_url() ?>op/import"	class="button">RETOUR</a> 
</div>
<hr />
<br />	
<?php endif; ?>
	</div>
</section>


