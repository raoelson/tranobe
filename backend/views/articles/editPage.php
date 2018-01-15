<script>  
	var idpage = "<?php if ($idpage)  echo $idpage ?>";
	var iduser = "<?php echo $user["iduser"]?>";
	var where= new Array();
	<?php if(isset($where)):?>
	<?php  list($key,$val) = each($where) ?>
	where[0] = "<?php echo $key ?>";
	where[1] = "<?php echo $val ?>";
	<?php endif ?>
</script>

<div class="main-inner">
  <div class="container">
    
    <div class="well well-large well-transparent lead"
							id="loading" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>
    <div class="row" id="main-form">
      <div class="span9">
        <div id="ancre"></div>
        <div class="widget ">
          <div class="widget-header"> <i class="icon-file"></i>
            <h3>Edition d'une page</h3>
          </div>
          <!-- /widget-header -->
          <input type="hidden" value="<?php echo ($user["idgroup"]==1||$user["idgroup"]==7)?1:2 ?>" id="niveau">
          <div class="widget-content">
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Page</a> </li>
                <!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->
                
              </ul>
              <br>
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <form id="edit-page" class="form-horizontal" onsubmit="return page.save()">
                    <input type="hidden" id="idpage" value="null">
                    <input type="hidden" id="user_iduser" value="<?php echo $user["iduser"]?>">
                    <fieldset>
                      <div class="control-group">
                        <label class="">Titre</label>
                        <input type="text" class="input-xxlarge" id="title" value="" >
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group -->
                      <div class="control-group">
                        <label class="">Alias</label>
                        <input type="text" class="input-xxlarge" id="alias" value="" >
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group -->
                      <div class="control-group">
                        <label>Corps de la page</label>
                        <textarea id="body" style="width: 100%" class="input-xxlarge"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group --> 
                      <div class="alert" id="message" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p> <strong>Succès!</strong> Enregistrement pris en compte. </p>
                  </div>
                      <br>
                      <div class="form-actions"> 
                      <a class="btn btn-primary" href="#" onclick="page.save()" id="save-button">Enregistrer</a>
                      <a class="btn" id="btn-cancel" href="#" onclick="page.cancel()">Annuler</a> 
                      <a class="btn" id="btn-preview" href="#" target="_blank" style="display: none">Aperçu</a> 
                      </div>
                      <!-- /form-actions -->
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /widget-content --> 
        </div>
        <!-- /widget --> 
      </div>
      <!-- /span8 -->
      <div class="span3">
        <div class="widget widget-box">
          <div class="widget-header">
            <h3>Cat&eacute;gories</h3>
          </div>
          <!-- /widget-header -->
          
          <div class="widget-content">
            <?php foreach($categories as $cat):?>
            <div class="control-group">
              <input type="radio" value="<?php echo $cat["idcategorie"] ?>" id="cat_<?php echo $cat["idcategorie"]?>" name="categorie_idcategorie" onclick="page.chooseCategorie(<?php echo $cat["idcategorie"] ?>)">
              &nbsp;<?php echo ucwords($cat["alias_categorie"]) ?></div>
            <?php endforeach ?>
          </div>
          <!-- /widget-content --> 
          
        </div>
        <!-- /widget-box --> 
        
      </div>
      <!-- /span2 -->
      <div class="span3" id="selectDistrict" style="display: none">
        <div class="widget widget-box">
          <div class="widget-header">
          <h3>Choisissez le district</h3>
          </div>
          <div class="widget-content">
          	<?php $current = 0 ?>
			<select name="page_code_district" id="page_code_district" >
				<option></option>
				<?php foreach ($districts as $district) : ?>
				<?php
				if ($district->idregion > $current) {
	                            $current = $district->idregion;
	                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
	                        }
	                        ?>
				<option value="<?php echo $district->code_district ?>">
					<?php echo ucwords(strtolower($district->nom_district)) ?>
				</option>
				<?php endforeach ?>
				</optgroup>
			</select>	
          </div>
        </div>
      </div>
      <div class="span3" id="selectRegion" style="display: none">
        <div class="widget widget-box">
          <div class="widget-header">
          <h3>Choisissez la région</h3>
          </div>
          <div class="widget-content">
			<select name="page_region_idregion" id="page_region_idregion" >
				<option></option>
				<?php foreach ($regions as $region) : ?>
				<option value="<?php echo $region->idregion ?>">
					<?php echo ucwords(strtolower($region->nom_region)) ?>
				</option>
				<?php endforeach ?>
			</select>	
          </div>
        </div>
      </div>		
      <div class="span3">
        <div class="widget widget-box">
          <div class="widget-header">
            <h3>Image à la une</h3>
          </div>
          <!-- /widget-header -->
          
          <div class="widget-content"> <img src="#" alt="" class="thumbnail span2" id="apercu" style="display:none; margin: 10px auto;  max-height: 210px">
            <select id="img">
            </select>
          </div>
        </div>
        <!-- /widget-content --
				</div>
				<!-- /widget-box --> 
      </div>
      <!-- /span 3 -->
      <div class="span3">
        <div class="widget widget-box">
          <div class="widget-header">
            <h3>Mots-clefs</h3>
          </div>
          <!-- /widget-header -->
          
          <div class="widget-content">
            <div class="control-group">
              <div class="controls">
                <input type="text" class="input-large " id="keywords">
                <p class="help-block"><i>Séparez les mots-clefs par des virgules</i></p>
              </div>
              <!-- /controls --> 
            </div>
          </div>
        </div>
        <!-- /widget-content --> 
        
      </div>
      <!-- /widget-box --> 
      
    </div>
    <!-- /span 3 --> 
  </div>
</div>
<!-- /container -->

</div>
<!-- /main-inner --> 

