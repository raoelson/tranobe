<script>  
	var idarticle = "<?php if ($idarticle)  echo $idarticle ?>"; 
	var iduser = "<?php echo $user["iduser"]?>";
</script>

<div class="main-inner">
  <div class="container">
    
    <div class="row" id="main-form">
      <div class="span9">
        <div id="ancre"></div>
        <div class="widget ">
          <div class="widget-header"> <i class="icon-file"></i>
            <h3>Edition d'un article</h3>
          </div>
          <!-- /widget-header -->
          
          <div class="widget-content">
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Article</a> </li>
                <!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->
                
              </ul>
              <br>
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <form id="edit-article" class="form-horizontal" onsubmit="return article.save()">
                    <input type="hidden" id="idarticle" value="null">
                    <input type="hidden" id="user_iduser" value="<?php echo $user["iduser"]?>">
                    <fieldset>
                      <div class="control-group">
                        <label class="">Titre</label>
                        <input type="text" class="input-xxlarge" id="title" value="" >
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group -->
                      
                      <div class="control-group">
                        <label>Corps de l'article</label>
                        <textarea id="body" style="width: 100%" class="input-xxlarge"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <div class="well well-large well-transparent lead"
							id="saving" style="display: none">
							
						</div>
                      <!-- /control-group --> 
                      <br>
                      <div class="form-actions"> 
                      <a class="btn btn-primary" href="#" onclick="article.save()" id="save-button">Enregistrer</a>
                      <a class="btn" id="btn-cancel" href="#" onclick="article.cancel()">Annuler</a> 
                      <a class="btn" id="btn-preview" href="#" target="_blank" style="display: none">Aperçu</a> </div>
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
              <input type="radio" value="<?php echo $cat["idcategorie"] ?>" id="cat_<?php echo $cat["idcategorie"]?>" name="categorie_idcategorie">
              &nbsp;<?php echo ucwords($cat["alias_categorie"]) ?></div>
            <?php endforeach ?>
          </div>
          <!-- /widget-content --> 
          
        </div>
        <!-- /widget-box --> 
        
      </div>
      <!-- /span2 -->
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

