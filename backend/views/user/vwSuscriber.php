<div class="main-inner">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="btn-toolbar pull-right">
					<a class="btn" href="#ancre" onClick="user.add()"><i class="icon-user"></i>
						Nouveau</a>
				</div>
				<div class="widget widget-table action-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>
							<?php echo isset($div_title)? $div_title: ucfirst($active) ?>
						</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<table class="table table-striped table-bordered" id="main-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom</th>
									<th>T&eacute;l.</th>
									<th>Active</th>
                                    <th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>

						<div class="well well-large well-transparent lead"
							id="loading-table" style="display: none">
							<i class="icon-spinner icon-spin icon-2x pull-left"></i> loading
							content...
						</div>

					</div>
					<!-- /widget-content -->
					<div class="pagination pull-right">
						<ul>
							<li class="disabled"><a href="#">Prec.</a></li>
							<li class="disabled"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Suiv.</a></li>
						</ul>
					</div>
				</div>
				<!-- /widget -->

			</div>
			<!-- /span12 -->

		</div>
		<!-- /row -->

		<div class="row" id="main-form" style="display: none">
			<div class="span8">
            	<div id="ancre"></div>
				<div class="widget ">
					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Edition d'un utilisateur</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile" data-toggle="tab">Profile</a>
								</li>
								<!-- <li><a href="#settings" data-toggle="tab">Settings</a> </li>-->

							</ul>
							<br>
							<div class="tab-content">
								<div class="tab-pane active" id="profile">
									<div class="alert" id="alert" style="display: none;">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<p></p>
									</div>
									<form id="edit-profile" class="form-horizontal">
										<input type="hidden" id="iduser" value="null">
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="username">Login</label>
												<div class="controls">
													<input type="text" class="input-medium disabled" id="login"
														value="goideate" disabled="disabled">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="firstname">Nom</label>
												<div class="controls">
													<input type="text" class="input-medium" id="username"
														value="">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="lastname">Num&eacute;ro
													t&eacute;lephone</label>
												<div class="controls">
													<input type="text" class="input-medium" id="numtel"
														value="+261">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->

											<div class="control-group">
												<label class="control-label" for="email">Adresse Email</label>
												<div class="controls">
													<input type="text" class="input-large" id="email"
														placeholder="user@host.com">
												</div>
												<!-- /controls -->
											</div>
											<!-- /control-group -->
											<div class="control-group">
												<label class="control-label" for="district_iddistrict">District</label>
												<div class="controls">
													<?php $current = 0 ?>
													<select name="district_iddistrict" id="district_iddistrict" >
														<option></option>
														<?php foreach ($districts as $district) : ?>
														<?php
														if ($district->idregion > $current) {
								                            $current = $district->idregion;
								                            echo '</optgroup><optgroup label="' . strtoupper($district->nom_region) . '">';
								                        }
								                        ?>
														<option value="<?php echo $district->iddistrict ?>">
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
			<!-- /span8 -->
			<div class="span4">
				<div class="widget widget-box">
					<div class="widget-header">
						<h3>Groupes</h3>
					</div>
					<!-- /widget-header -->

					<div class="widget-content"></div>
					<!-- /widget-content -->

				</div>
				<!-- /widget-box -->

			</div>
			<!-- /span4 -->

		</div>
	</div>
	<!-- /container -->

</div>
<!-- /main-inner -->

