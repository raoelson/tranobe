<script>
	var idedl = 0;
</script>
<div class="main-inner">
  <div class="container">
    
    
    <div class="row" id="main-form">
      <div class="span9">
        <div id="ancre"></div>
        <div class="widget ">
          <div class="widget-header"> <i class="icon-file"></i>
            <h3>Gestion EDL</h3>
          </div>
          <!-- /widget-header -->
          <div class="widget-content">
            <div class="tabbable">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">EDL</a> </li>
                <!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->
                
              </ul>
              <br>
              <div class="well well-large well-transparent lead" id="loading" style="display: none">
				<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading content...
			  </div>
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <form id="edit-edl" class="form-horizontal" onsubmit="return edl.save()">
                    <fieldset>
                      <!-- /control-group -->
                      <div class="control-group">
                        <label>Contexte</label>
                        <textarea id="contexte" style="width: 100%" class="input-xxlarge" rows="10"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <div class="control-group">
                        <label>Données AEP</label>
                        <textarea id="donnees_aep" style="width: 100%" rows="10" class="input-xxlarge"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group --> 
                      <div class="control-group">
                        <label>Situation Géographique</label>
                        <textarea id="situation_geo" style="width: 100%" rows="10" class="input-xxlarge"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <div class="control-group">
                        <label>Stratégie de service</label>
                        <textarea id="strategie_service" style="width: 100%" rows="10" class="input-xxlarge"></textarea>
                        
                        <!-- /controls --> 
                      </div>
                      <!-- /control-group --> 
                      <div class="alert" id="message" style="display: none">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p> <strong>Succès!</strong> Enregistrement pris en compte. </p>
                  </div>
                      <br>
                      <div class="form-actions"> 
                      <a class="btn btn-primary" href="#" onclick="edl.save()" id="save-button">Enregistrer</a>
                      <a class="btn" id="btn-cancel" href="#" onclick="edl.cancel()">Annuler</a> 
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
      <div class="span3" id="selectDistrict">
        <div class="widget widget-box">
          <div class="widget-header">
          <h3>Année</h3>
          </div>
          <div class="widget-content">
           <select id="annee">
          	<option value="2013">2013</option>
          	<option value="2012">2012</option>
          	<option value="2011">2011</option>
          </select>
          </div>
        </div>
      </div>
      <div class="span3" id="selectDistrict">
        <div class="widget widget-box">
          <div class="widget-header">
          <h3>Choisissez le district</h3>
          </div>
          <div class="widget-content">
           <div class="control-group">
           	<div class="controls">
          	<?php $current = 0 ?>
						<select name="edl_code_district" id="edl_code_district" >
							<option></option>
							<?php foreach ($districts as $district) : ?>
							<?php
							if ($district->idregion > $current) {
				                            $current = $district->idregion;
				                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
				                        }
				            ?>
				            <?php if ($district->code_district<121 || $district->code_district>127):?>
							<option value="<?php echo $district->code_district ?>">
								<?php echo ucwords(strtolower($district->nom_district)) ?>
							</option>
							<?php endif ?>
							<?php endforeach ?>
							</optgroup>
						</select>	
			</div>
			<div class="controls" style="margin-top: 20px">
				<input type="button" id="btn-get" value="Récupérer l'EDL" class="btn btn-primary" onclick="edl.get()">
				<input type="button" id="btn-delete" value="Supprimer l'EDL" class="btn btn-remove" onclick="edl.remove()">
			</div>
			</div>
          </div>
        </div>
      </div>
      <div class="span3">
        <div class="widget widget-box">
          <div class="widget-header">
            <h3>Filières prioritaires</h3>
          </div>
          <!-- /widget-header -->
          
          <div class="widget-content">
            <div class="control-group">
              <div class="controls">
                <input type="text" class="input-large " id="filieres_prioritaires">
                <p class="help-block"><i>Séparez les filières par des virgules</i></p>
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
      <!-- /widget-box --> 
      
    </div>
    <!-- /span 3 --> 
  </div>
</div>
<!-- /container -->

</div>
<!-- /main-inner --> 

