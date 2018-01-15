	<div class="main-inner">

		<div class="container">

			<div class="row">
				<div class="span8">
					<div class="widget ">
						<div class="widget-header">
							<i class="icon-user"></i>
							<h3>Envoi de messages</h3>
						</div>
						<!-- /widget-header -->
						<div class="widget-content">
						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>
							<div id="profile">
								<form id="edit-profile" class="form-horizontal" action="">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="username">Groupe(s) destinataire(s)</label>
											<div class="controls">
												<select id="dest" class="multiselect" multiple="multiple">
												    <?php foreach($groups as $group) :?>
													<option value="<?php echo $group->keyword?>"><?php echo $group->groupname ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->
										<div class="control-group">
											<label class="control-label" for="text"> Message</label>
											<div class="controls">
												<textarea class="span5" style="height: 185px" id="text"></textarea>
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->


										<div class="control-group">
											<label class="control-label" for="password2">Caractères
												restants</label>
											<div class="controls">
												<input type="text" class="input-mini disabled" id="nb_car"
													value="148" disabled >
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->

									
										<div class="alert alert-info" style="display: none"><i class="icon-info-sign"></i> Votre message va être envoyé aux groupes: 
											<span id="group-name"></span>
										</div>
										<br>

										
										<div class="form-actions">
											<button type="button" id="btn-save" onclick="message.send()" class="btn btn-primary">Envoyer</button>
											<button type="reset" class="btn">Annuler</button>
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
	</div>
	<!-- /row -->



