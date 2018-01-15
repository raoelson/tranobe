<div id="main">
	<div class="entry">
			<h2><i class="icon-arrow-right title-icon"></i> <a href="#"><?php echo $page["title"]?></a></h2>                
        <!-- Thumbnail -->
        <?php if ($page["img"]<>"null" && $page["img"]<>"") :?>
		<span class="bthumb2"> <img 
			src="<?php echo $page["img"] ?>" alt="<?php echo basename($page["img"]) ?>">
		</span> <?php endif ?>                   
        <div style="min-height: 200px" class="article"><?php echo $page["body"]?> </div>                         
   
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