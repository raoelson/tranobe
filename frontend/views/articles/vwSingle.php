<div id="main">
	<div class="entry">
			<h2><i class="icon-arrow-right title-icon"></i> <a href="#"><?php echo $article["title"]?></a></h2>
        <!-- Meta details -->
	    <div class="meta">
	    	<i class="icon-calendar"></i> <?php echo dateMysql2Fr($article["date_write"]) ?> <i class="icon-user"></i> <?php echo $article["username"] ?><i class="icon-folder-open"></i> <a href="#"><?php echo $article["alias_categorie"]?></a> 
	    </div>                   
        <!-- Thumbnail -->
        <?php if ($article["img"]) :?>
		<span class="bthumb2"> <img 
			src="<?php echo base_url().$article["img"] ?>" alt="<?php echo basename($article["img"]) ?>">
		</span> <?php endif ?>                   
        <div style="min-height: 200px; text-align: justify" class="article"><?php echo $article["body"]?> </div>                         
   
	<div class="post-foot well">
		<!-- Social media icons -->
		<div class="social">
			<h6>Partager cet article sur:</h6> 
			<a href="http://www.facebook.com/sharer.php?u=<?php echo current_url()?>"  target="_blank"><i class="icon-facebook facebook"></i></a> 
			<a href="http://twitter.com/intent/tweet?url=<?php echo current_url()?>" target="_blank"><i class="icon-twitter twitter"></i>
			</a> <a href="https://plus.google.com/share?url=<?php echo current_url()?>" target="_blank"><i class="icon-google-plus google-plus"></i>
			</a>
		</div>
	</div>
	 <div class="clearfix"></div>
	 </div>   
</div>
