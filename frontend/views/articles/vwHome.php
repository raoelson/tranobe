<div id="main">
	<h2 class="h2_title">Actualités <?php if (empty($by_region)):?>sur le réseau<?php else :?>dans la Région de: <?php echo $nom_region ?><?php endif ?></h2>
	<?php  if (empty($actus)) :?> Aucun article pour le moment. <?php endif ?>
	<?php foreach($actus as $article):?>
		<div class="entry">
			<h2><i class="icon-folder-open-alt title-icon"></i> <a href="<?php echo base_url().human_url($article["alias_categorie"])."/".$article["idarticle"]."-".human_url($article["title"])?>"><?php echo $article["title"]?></a></h2>
        <!-- Meta details -->
	    <div class="meta">
	    	<i class="icon-calendar"></i> <?php echo dateMysql2Fr($article["date_write"]) ?> <i class="icon-user"></i> <?php echo $article["username"] ?><i class="icon-folder-open"></i> <a href="#"><?php echo $article["alias_categorie"]?></a> 
	    </div>                     
		<!-- Thumbnail -->
        <?php if ($article["img"]) :?>
		<span class="bthumb2"> <img 
			src="<?php echo base_url().$article["img"] ?>" alt="<?php echo basename($article["img"]) ?>">
		</span> <?php endif ?>
        <p><?php echo word_limiter(strip_tags($article["body"]),50) ?></p>
        	<a class="btn btn-success" href="<?php echo base_url().human_url($article["alias_categorie"])."/".$article["idarticle"]."-".human_url($article["title"])?>">Lire la suite</a>
        <div class="clearfix"></div>             	                                 
	    </div>
	<?php endforeach;?>
</div>
<?php echo $pages ?>