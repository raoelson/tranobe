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
							<div id="profile">
								<form id="edit-profile" class="form-horizontal" action="">
									<fieldset>

										<div class="control-group">
											<label class="control-label" for="username">Destinataire(s)</label>
											<div class="controls">
												<select id="dest" class="multiselect span5" multiple="multiple">
												    <option value="+261344910114">Serveur</option>
												    <?php foreach($users as $user) :?>
													<option value="<?php echo $user["numtel"]?>"><?php echo $user["username"] ?></option>
													<?php endforeach ?>
												</select>
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->


										<div class="control-group">
											<label class="control-label" for="text"> Message</label>
											<div class="controls">
												<textarea class="span5" maxlength="148" id="text" style="height: 185px"></textarea>
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->


										<div class="control-group">
											<label class="control-label" for="password2">Caractères
												restants</label>
											<div class="controls">
												<input type="text" class="input-mini disabled" id="nb_car"
													value="150" disabled >
											</div>
											<!-- /controls -->
										</div>
										<!-- /control-group -->
                                        <div class="alert alert-info" style="display: none"><i class="icon-info-sign"></i> Votre message va être envoyé à: 
											<span id="group-name"></span>
										</div>
										
										<br>
										<div class="form-actions">
											<button type="button" class="btn btn-primary" id="btn-save">Save</button>
											<button class="btn">Cancel</button>
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

<!-- /container -->
<!-- /main-inner -->


