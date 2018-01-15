<div class="main-inner">
	<div class="container">
		<div class="row" id="main-form" style="margin: 0 auto">
			<div class="span8">
            	<div id="ancre"></div>
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Modifier mon profil</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="tabbable">
							
							<br>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
									<div class="alert" id="alert" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p></p>
									</div>
									<form id="edit-profile" class="form-horizontal">
										<input type="hidden" id="iduser" value="<?php echo $user["iduser"] ?>">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="login">Login</label>
												<div class="controls">
													<input type="text" class="input-medium disabled" id="login"
														value="<?php echo $user["login"] ?>" disabled="disabled">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="firstname">Nom</label>
												<div class="controls">
													<input type="text" class="input-medium" id="username"
														value="<?php echo $user["username"]?>">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="lastname">Num&eacute;ro
													t&eacute;lephone</label>
												<div class="controls">
													<input type="text" class="input-medium" id="numtel"
														value="<?php echo $user["numtel"]?>">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="email">Adresse Email</label>
												<div class="controls">
													<input type="text" class="input-large" id="email"
														placeholder="user@host.com" value="<?php echo $user["email"]?>">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->
											<div class="control-group">
												<label class="control-label" for="code_district">District</label>
												<div class="controls">
													<?php $current = 0 ?>
													<select name="code_district" id=code_district >
														<option></option>
														<?php foreach ($districts as $district) : ?>
														<?php
														if ($district->idregion > $current) {
								                            $current = $district->idregion;
								                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
								                        }
								                        ?>
														<option value="<?php echo $district->code_district ?>" <?php echo ($district->code_district==$user["code_district"])?"selected":"" ?>>
															<?php echo ucwords(strtolower($district->nom_district)) ?>
														</option>
														<?php endforeach ?>
														</optgroup>
													</select>
												</div>
											</div>

											<br> <br>
											<div class="control-group">
												<label class="control-label" for="password1">Password</label>
												<div class="controls">
													<input type="password" class="input-medium" id="password"
														value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="password2">Confirm</label>
												<div class="controls">
													<input type="password" class="input-medium"
														id="password-confirm" value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<br>
											<div class="form-actions">
												<a class="btn btn-primary" href="javascript: user.save()">Save</a>
												<a class="btn" href="javascript: user.cancel()">Cancel</a>
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
		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

