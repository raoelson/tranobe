<div class="main-inner">
<div class="container">
<div class="row">
<div class="span6">
<div class="widget">
<div class="widget-header"><i class="icon-star"></i>
<h3>Stats rapides</h3>
</div>
<!-- /widget-header -->

<div class="widget-content">
<div class="stats">
<div class="stat"><span class="stat-value"><?php echo $inbox = record_count("inbox") ?></span>
Messages reçus</div>

<!-- /stat -->

<div class="stat"><span class="stat-value"><?php echo $outbox = record_count("outbox")?></span>
Messages envoyés</div>
<!-- /stat -->

<div class="stat"><span class="stat-value"><?php echo record_count("user")?></span>
Utilisateurs</div>
<!-- /stat --></div>
<!-- /stats -->

<div id="chart-stats" class="stats">
<div class="stat stat-chart">
<div id="donut-chart" class="chart-holder"></div>
<!-- #donut --></div>
<!-- /substat -->

<div class="stat stat-time"><span class="stat-value"><?php echo $inbox+$outbox?></span>
Messages traités</div>
<!-- /substat --></div>
<!-- /substats --></div>
<!-- /widget-content --></div>
<!-- /widget -->

<div class="widget widget-nopad">
<div class="widget-header"><i class="icon-list-alt"></i>
<h3>Derniers articles</h3>
</div>
<!-- /widget-header -->

<div class="widget-content">
<ul class="news-items">
<?php foreach($articles as $article):?>
	<li>
	<div class="news-item-detail"><a
		href="<?php echo base_url().human_url($article["alias_categorie"])."/".$article["idarticle"]."-".human_url($article["title"])?>"
		target="_blank" class="news-item-title"><?php echo $article["title"]?></a>
	<p class="news-item-preview"
		style="font: 13px/1.7em 'Open Sans' !important;"><?php echo word_limiter(strip_tags($article["body"]),25) ?></p>
	</div>
	</li>
	<?php endforeach ?>
</ul>
</div>
<!-- /widget-content --></div>
<!-- /widget -->


<!-- /widget --></div>
<!-- /span6 -->

<div class="span6">
<div class="widget">
<div class="widget-header"><i class="icon-bookmark"></i>
<h3>Raccourcis</h3>
</div>
<!-- /widget-header -->

<div class="widget-content">
<div class="shortcuts"><a
	href="<?php echo  base_url()?>admin.php/article/edit" class="shortcut">
<i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Nouvel
article</span> </a> <a
	href="<?php echo  base_url()?>admin.php/page/edit" class="shortcut"> <i
	class="shortcut-icon icon-file"></i> <span class="shortcut-label">Nouvelle
page</span> </a> <a href="<?php echo  base_url()?>admin.php/graph/prix"
	class="shortcut"> <i class="shortcut-icon icon-signal"></i> <span
	class="shortcut-label">Graphs et Stats</span> </a> <?php if ($user["idgroup"] == 1):?>
<a href="<?php echo  base_url()?>admin.php/user" class="shortcut"> <i
	class="shortcut-icon icon-user"></i> <span class="shortcut-label">Utilisateurs</span>
</a> <?php endif ?> <a href="<?php echo  base_url()?>admin.php/media"
	class="shortcut"> <i class="shortcut-icon icon-picture"></i> <span
	class="shortcut-label">Médias</span> </a> <!-- /shortcuts --></div>
<!-- /widget-content --></div>
</div>
<!-- /widget -->

<div class="widget">
<div class="widget-header"><i class="icon-signal"></i>
<h3>Chart</h3>
</div>
<!-- /widget-header -->

<div class="widget-content">
<div id="area-chart" class="chart-holder"></div>
</div>
<!-- /widget-content --></div>
<!-- /widget -->


<!-- /widget-content --></div>
<!-- /widget --></div>
<!-- /span6 --></div>
<!-- /row --></div>
<!-- /container --></div>
<!-- /main-inner -->
