<?php
function box($cat){
	$ci = &get_instance();
	$q = $ci->db->query("
			SELECT title,idarticle,alias_categorie,nom_categorie,idcategorie FROM article A
			LEFT JOIN categorie C ON C.idcategorie = A.categorie_idcategorie
			WHERE nom_categorie = '$cat' AND is_publish=1
			ORDER BY idarticle DESC 
			LIMIT 4
		");
	$boxes = $q->result_array(); 
	
?>
	<?php if (count($boxes)):  ?>
<div class="box">
	<?php $i= 0?>
	<?php foreach($boxes as $box) :?>
	<?php if ($i++ == 0 ) :?>
	<h3>
		<i class="icon-list-ul pull-right"></i><?php echo $box["alias_categorie"]?>
	</h3>
	<ul>
	<?php endif ?>
		<li><a href="<?php echo base_url().human_url($box["alias_categorie"])."/".$box["idarticle"]."-".human_url($box["title"])?>"><?php echo $box["title"]?></a></li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif ?>
<?php  
}
function box_page($cat){
	$ci = &get_instance();
	$q = $ci->db->query("
			SELECT title,idpage,alias_categorie,nom_categorie,idcategorie FROM page A
			LEFT JOIN categorie C ON C.idcategorie = A.categorie_idcategorie
			WHERE nom_categorie = '$cat' AND is_publish=1
			ORDER BY idpage DESC
			LIMIT 4
			");
			$boxes = $q->result_array();
	?>
	<?php if (count($boxes)):  ?>
<div class="box">
	<?php $i= 0?>
	<?php foreach($boxes as $box) :?>
	<?php if ($i++ == 0 ) :?>
	<h3>
		<i class="icon-list-ul pull-right"></i><?php echo $box["alias_categorie"]?>
	</h3>
	<ul>
	<?php endif ?>
		<li><a href="<?php /*echo base_url().human_url($box["alias_categorie"])."/".$box["idarticle"]."-".human_url($box["title"]) */ ?>"><?php echo $box["title"]?></a></li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif ?>
<?php  
}

function human_url($url){
	return url_title(convert_accented_characters(strtolower($url)));
}
