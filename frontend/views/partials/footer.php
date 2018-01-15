 <div class="container">
    <div class="row">


      <div class="widgets">

        <div class="span3">
          <div class="fwidget">
            
            <h4>Contact</h4>

                  <p>Pour nous contacter, voici nos adresses :</p>
                  <hr>
                  <i class="icon-home"></i> &nbsp; Bâtiment ex-Microhydraulique, Nanisana, Antananarivo, Madagascar
                  <hr>
                  <i class="icon-phone"></i> &nbsp; +261 34 08 625 44
                  <hr>
                  <i class="icon-envelope-alt"></i> &nbsp; <a href="mailto: infocom@tranobenytantsaha.mg">infocom@tranobenytantsaha.mg</a>
                  <hr>
                    <div class="social">
                      <a href="#" class="bblue"><i class="icon-facebook"></i></a>
                      <a href="#" class="borange"><i class="icon-google-plus"></i></a> 
                      <a href="#" class="blightblue"><i class="icon-twitter"></i></a>
                      <a href="#" class="borange"><i class="icon-rss"></i></a>
                    </div>

          </div>
        </div>

        <div class="span3">
          <div class="fwidget">
            <h4>Liens utiles</h4>
            <ul>
              <li><a href="<?php echo base_url()?>tsena">Retrouvez les offres et demandes sur le site</a></li>
              <li><a href="<?php echo base_url()?>prix">Prix des produits à Madagascar</a></li>
              <li><a href="<?php echo base_url()?>op">Base de données des OP</a></li>
              <li><a href="<?php echo base_url()?>annuaire">Annuaires</a></li>
            </ul>
          </div>
        </div>        
        <div class="span3">
          <div class="fwidget">
            <h4>Newsletter</h4>
            <p>Inscrivez-vous gratuitement et recevez les actualités sur notre réseau.</p>
            <p>Entrer votre adresse email pour s'inscrire</p>
            <form class="form-inline" id="form_suscribe">
              <div class="input-append row-fluid">
                <input type="text" class="span8" placeholder="Subscribe" id="email_adress">
                <button type="button" class="btn btn-danger" onclick="suscriber.save()">S'inscrire</button>
              </div>
              <div class="alert alert-success hide" id="success_message" style="margin-top: 10px">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Félicitation!</strong> Vous faites partie maintenant de notre liste de diffusion.
            </div>
            </form>

          </div>
        </div>

        <div class="span3">
          <div class="fwidget">
            <h4>Actualités</h4>
            <?php $footer_articles = box("actu",1) ?>
            <ul>
              <?php foreach ($footer_articles as $box):?>	
              <li><a href="<?php echo base_url().human_url($box["alias_categorie"])."/".$box["idarticle"]."-".human_url($box["title"])?>" title="<?php echo $box["title"]?>"><?php echo word_limiter($box["title"],5,'...')?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>

      </div>

      <div class="span12">
          <div class="copy">
                <p>Copyright © <a href="<?php echo base_url()?>">Réseau interCSA</a> - <a href="/">Accueil</a> |  <a href="<?php echo base_url()?>contact">Nous contacter</a></p>
          </div>
      </div>

    </div>
 <div class="modal hide fade" id="modal_suscriber">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Quelques informations réquises</h3>
  </div>
  <div class="modal-body">
    <form id="edit-profile" class="form-horizontal">
		<input type="hidden" id="idsuscriber" value="null">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="url_src">Nom (*)</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="suscribername">
				</div>
				<!-- /controls -->
			</div>
			<div class="control-group">
				<label class="control-label" for="numtel">Téléphone</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="numtel" value="+261">
				</div>
				<!-- /controls -->
			</div>	
			<div class="control-group">
				<label class="control-label" for="url_dst">Organisme/Profession</label>
				<div class="controls">
					<textarea class="input-xlarge" id="organisme_profession"></textarea>
				</div>
				<!-- /controls -->
			</div>
			<!-- /control-group -->
			<!-- /form-actions -->
		</fieldset>
	</form>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Annuler</a>
    <a href="javascript: suscriber.confirm()" class="btn btn-primary">Confirmer & Enregistrer</a>
  </div>
</div>  
  <div class="clearfix"></div>
  </div>
<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/js/suscriber.js"></script>